<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
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
        $dataproduct = $this->product->where('hot', 1)->where('status', 1)->get();
        return view('frontend.home', compact('dataproduct'));
    }

    public function getProductDetails($id)
    {
        $product = Product::with('productDetails')->find($id);

        if ($product) {
            return response()->json([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'product_details' => $product->productDetails,
            ]);
        } else {
            return response()->json(['error' => 'Không tìm thấy chi tiết sản phẩm'], 404);
        }
    }
}
