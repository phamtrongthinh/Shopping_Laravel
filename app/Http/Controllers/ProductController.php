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
        $product = Product::with('productDetails')->findOrFail($id);
    
        // Lọc ra các màu duy nhất ( thong qua tham chieu goi ra ban ghi cua mau sac), nếu trùng thì lấy ban ghi đầu tiên
        $colors = [];
        foreach ($product->productDetails as $detail) {
            $color = (string) $detail->color;  // Đảm bảo màu là chuỗi
            if (!in_array($color, $colors)) {
                $colors[] = $color;
            }
        }
        
    
        // Tạo mảng chứa ảnh theo màu (chỉ lấy ảnh của chi tiết đầu tiên theo màu)
        $imagesByColor = [];
        foreach ($colors as $color) {
            // Lấy chi tiết đầu tiên có màu này
            $firstDetailWithColor = $product->productDetails->firstWhere('color', $color);
            if ($firstDetailWithColor) {
                $imagesByColor[$color] = $firstDetailWithColor->image;
            }
        }
        ///
    
        return view('frontend.productdetail', compact('product', 'imagesByColor','colors'));
    }
    
}
