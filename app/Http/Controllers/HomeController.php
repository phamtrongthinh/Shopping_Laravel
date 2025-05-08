<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $query = $this->product->where('hot', 1)->where('status', 1);

        if (auth()->check()) {
            $userId = auth()->id();
            $query = $query->with(['likes' => function ($q) use ($userId) {
                $q->where('user_id', $userId);
            }]);
        }

        $dataproduct = $query->get();

        return view('frontend.home', compact('dataproduct'));
    }
    
    public function search(Request $request)
    {
        $keyword = $request->input('search');

        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->get();

        return view('frontend.search_results', compact('products', 'keyword'));
    }


    public function getProductDetails($id)
    {
        $product = Product::with(['productDetails'])->find($id);

        if (!$product) {
            return response()->json(['error' => 'Không tìm thấy chi tiết sản phẩm'], 404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'description' => $product->description ?? '',
            'product_details' => $product->productDetails->map(function ($detail) {
                return [
                    'id' => $detail->id,
                    'color' => $detail->color ?? null,
                    'size' => $detail->size ?? null,
                    'image_path' => $detail->image_path ? asset($detail->image_path) : null,
                ];
            }),
        ]);
    }

    public function gender($gender)
    {
        $genderMap = [
            'nam' => 'men',
            'nu' => 'women',
            'unisex' => 'unisex',
            'nam-nu' => 'unisex' // phòng trường hợp dùng 'nam-nu' cũng vẫn ra unisex
        ];

        $dbGender = $genderMap[$gender] ?? null;

        if (!$dbGender) {
            abort(404); // nếu không đúng gender thì báo lỗi
        }

        $dataproduct = Product::where('gender', $dbGender)->get();

        return view('frontend.gender_product', compact('dataproduct', 'gender'));
    }


    public function favorites2()
    {
        // Lấy danh sách sản phẩm mà user đã yêu thích
        $user = auth()->user();
        if ($user) {
            $dataproduct = Product::whereHas('likes', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        } else {
            $dataproduct = collect(); // Nếu không đăng nhập, trả về một tập rỗng
        }
        return view('frontend.list_like', compact('dataproduct'));
    }   
}
