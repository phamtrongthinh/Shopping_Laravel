<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

class ProductController extends Controller
{
    protected $account;
    protected $color;
    protected $product;
    protected $category;
    protected $productDetail;

    public function __construct()
    {
        $this->account = new User();
        $this->product = new Product();
        $this->category = new Category();
        $this->productDetail = new ProductDetail();
        $this->color = new Color();
    }

    public function index()
    {
        $dataproduct = $this->product->all();
        return view('frontend.product', compact('dataproduct'));
    }


    public function getProductDetails($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }



    //----------------------------------Chi tiet san pham-----------------------------------------------
    public function show($id)
    {
        // lấy một sản phẩm với ID cụ thể ($id), và đồng thời tải các chi tiết sản phẩm (productDetails) liên quan đến sản phẩm đó.
        $product = Product::with('productDetails')->findOrFail($id);


        // Lọc ra các màu duy nhất ( thong qua tham chieu goi ra ban ghi cua mau sac), nếu trùng thì lấy ban ghi đầu tiên
        $colors = [];
        foreach ($product->productDetails as $detail) {       // goi ra cac chi tiet san pham
            $color = (string) $detail->color;  // tao bien lư cac ban ghi color co trong chi tiet san pham         
            if (!in_array($color, $colors)) {
                $colors[] = $color;
            }
        }

        // danh sach mau
        $colornameids = [];
        foreach ($product->productDetails as $detail) {       // goi ra cac chi tiet san pham   
            $colordad = $detail->color; // Đây là đối tượng liên kết với bảng Color
            $colorId = $colordad->id;  // ID của màu
            $colorName = $colordad->name;  // Tên của màu
            // Kiểm tra nếu màu này chưa có trong danh sách, thêm vào
            if (!in_array($colorId, array_column($colornameids, 'id'))) {
                $colornameids[] = [
                    'id' => $colorId,
                    'name' => $colorName
                ];
            }
        }

        // Tạo mảng chứa ảnh theo màu (chỉ lấy ảnh của chi tiết đầu tiên theo màu)
        $imagesByColor = [];
        foreach ($colors as $color) {
            // Lấy chi tiết đầu tiên có màu này
            $firstDetailWithColor = $product->productDetails->firstWhere('color', $color); // tỉm ra ban ghi mau sac trong toan bo bang color
            if ($firstDetailWithColor) {
                $imagesByColor[$color] = $firstDetailWithColor->image;
            }
        }

        return view('frontend.productdetail', compact('product', 'imagesByColor', 'colornameids'));
    }


    public function getSizesByColor(Request $request)
    {
        // Lấy id màu sắc từ yêu cầu AJAX
        $colorId = $request->input('color_id');
        $productId = $request->input('product_id');

        // Lấy chi tiết sản phẩm theo màu
        $sizes = ProductDetail::where('product_id', $productId)
            ->where('color_id', $colorId)
            ->pluck('size'); // Lấy các kích thước duy nhất

        // Trả về các size dưới dạng JSON
        return response()->json($sizes);
    }

    public function getPrice(Request $request)
    {
        $productId = $request->input('product_id');
        $colorId = $request->input('color_id');
        $sizeId = $request->input('size_id');
        // Kiểm tra đầu vào
       

        $variant = ProductDetail::where('product_id', $productId)
            ->where('color_id', $colorId)
            ->where('size', $sizeId)
            ->first();
           
        if ($variant) {
            return response()->json(['price' => (float) $variant->price]);
        }

        return response()->json(['price' => null]);
    }
}
