<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InventoryImport;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class InventoryImportController extends Controller
{
    // Hiển thị danh sách phiếu nhập kho
    public function index()
    {
        $imports = InventoryImport::with('items.productDetail')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.inventory_imports.index', [
            'imports' => $imports,
            'title' => 'Quản lý phiếu nhập kho',

        ]);
    }

    // Hiển thị form tạo phiếu nhập kho
    public function create()
    {
        $productDetails = ProductDetail::with('product')
            ->get()
            ->sortByDesc(function ($item) {
                return $item->product->name ?? '';
            });

        // Lấy danh sách sản phẩm chi tiết       
        return view('admin.inventory_imports.create', [
            'productDetails' => $productDetails,
            'title' => 'Quản lý phiếu nhập kho',

        ]);
    }
    public function store(Request $request)
    {
        // Debugging, bạn có thể xóa hoặc để lại khi cần kiểm tra


        // Validate dữ liệu nhập
        $request->validate([
            'note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_detail_id' => 'required|exists:product_details,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0', // Đảm bảo giá là đúng
        ]);

        // Tạo phiếu nhập kho
        $inventoryImport = InventoryImport::create([
            'user_id' => auth()->id(),
            'note' => $request->note,
            'total_amount' => 0, // Tổng tiền sẽ tính sau
        ]);

        $totalAmount = 0;

        // Tạo chi tiết phiếu nhập kho
        foreach ($request->items as $item) {
            $inventoryImportItem = $inventoryImport->items()->create([
                'product_detail_id' => $item['product_detail_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'], // sử dụng unit_price thay vì price
            ]);

            // Cộng dồn tổng số tiền
            $totalAmount += $inventoryImportItem->quantity * $inventoryImportItem->unit_price;

            // ✅ Cập nhật số lượng tồn kho trong bảng product_details
            $productDetail = ProductDetail::find($item['product_detail_id']);
            $productDetail->quantity += $item['quantity'];
            $productDetail->save();
        }

        // Cập nhật lại tổng số tiền cho phiếu nhập kho
        $inventoryImport->update(['total_amount' => $totalAmount]);

        // Điều hướng đến trang danh sách phiếu nhập kho
        return redirect()->route('admin.inventory.imports.index')->with('success', 'Phiếu nhập kho đã được tạo.');
    }

    public function show($id)
    {
        $import = InventoryImport::with('items.productDetail.product', 'user')->findOrFail($id);


        return view('admin.inventory_imports.show', [
            'import' => $import,
            'title' => 'Quản lý phiếu nhập kho',

        ]);
    }
    public function destroy($id)
    {
        $import = InventoryImport::with('items')->findOrFail($id);

        // Trừ lại số lượng sản phẩm trong kho
        foreach ($import->items as $item) {
            $productDetail = ProductDetail::find($item->product_detail_id);
            if ($productDetail) {
                $productDetail->quantity -= $item->quantity;

                // Đảm bảo số lượng không âm
                if ($productDetail->quantity < 0) {
                    $productDetail->quantity = 0;
                }

                $productDetail->save();
            }
        }

        // Xóa phiếu nhập và các chi tiết liên quan
        $import->items()->delete(); // Xoá chi tiết trước
        $import->delete();          // Rồi xoá phiếu

        return redirect()->route('admin.inventory.imports.index')
            ->with('success', 'Đã xóa phiếu nhập thành công và cập nhật tồn kho!');
    }

    public function edit($id)
    {
        $import = InventoryImport::with('items')->findOrFail($id);
        // Kiểm tra nếu đã quá 2 ngày thì không cho sửa
        if (now()->diffInDays($import->created_at) > 2) {
            return redirect()->route('admin.inventory.imports.index')
                ->with('error', 'Phiếu nhập đã quá hạn chỉnh sửa (quá 2 ngày).');
        }
        $productDetails = ProductDetail::with('product', 'color')->get()->sortByDesc(function ($item) {
            return $item->product->name ?? '';
        });;


        return view('admin.inventory_imports.edit', [
            'import' => $import,
            'productDetails' => $productDetails,
            'title' => 'Quản lý phiếu nhập kho',

        ]);
    }
    public function update(Request $request, $id)
    {
        $import = InventoryImport::with('items')->findOrFail($id);
        // Kiểm tra nếu đã quá 2 ngày thì không cho cập nhật
        // if (now()->diffInDays($import->created_at) > 2) {
        //     return redirect()->route('admin.inventory.imports.index')
        //         ->with('error', 'Không thể cập nhật phiếu nhập đã quá 2 ngày.');
        // }
        // Không cho cập nhật nếu đã quá 2 tiếng kể từ khi tạo
        if (now()->diffInHours($import->created_at) > 2) {
            return redirect()->route('admin.inventory.imports.index')
                ->with('error', 'Không thể cập nhật phiếu nhập sau 2 tiếng kể từ khi tạo.');
        }


        // ✅ Bước 1: Trừ lại số lượng đã nhập trước đó
        foreach ($import->items as $oldItem) {
            $productDetail = ProductDetail::find($oldItem->product_detail_id);
            if ($productDetail) {
                $productDetail->quantity -= $oldItem->quantity;
                if ($productDetail->quantity < 0) $productDetail->quantity = 0;
                $productDetail->save();
            }
        }

        // ✅ Bước 2: Xoá các item cũ
        $import->items()->delete();

        $totalAmount = 0;

        // ✅ Bước 3: Tạo lại item mới và cộng số lượng vào tồn kho
        foreach ($request->items as $item) {
            $import->items()->create([
                'product_detail_id' => $item['product_detail_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
            ]);

            // Cộng lại số lượng mới vào tồn kho
            $productDetail = ProductDetail::find($item['product_detail_id']);
            if ($productDetail) {
                $productDetail->quantity += $item['quantity'];
                $productDetail->save();
            }

            $totalAmount += $item['quantity'] * $item['unit_price'];
        }

        // ✅ Bước 4: Cập nhật phiếu nhập
        $import->update([
            'note' => $request->note,
            'total_amount' => $totalAmount,
        ]);

        return redirect()->route('admin.inventory.imports.index')->with('success', 'Cập nhật phiếu nhập và tồn kho thành công!');
    }
}
