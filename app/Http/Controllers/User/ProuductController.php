<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;
use App\Models\Cart_detail;
use Illuminate\Support\Facades\Auth;
class ProuductController extends Controller
{

    public function homeProducts(){
        $cart= Cart::with([
            'cart_details:id,cart_id,product_id,quantity',
            'cart_details.product:id,name,price,description,category_id',
            'cart_details.product.category:id,name',
            'cart_details.product.images:image_id,image_url,image_type'
        ])
        ->first();
        $listProduct = Product::with(['category:id,name', 'images:image_id,image_url,image_type'])->paginate(5);
        return view('user.home')->with([
            'listProduct' => $listProduct,
            'cart'=>$cart
        ]);
    }
    // trang danh sách sản phẩm
    public function listProductsUser(Request $request){
        $cart= Cart::with([
            'cart_details:id,cart_id,product_id,quantity',
            'cart_details.product:id,name,price,description,category_id',
            'cart_details.product.category:id,name',
            'cart_details.product.images:image_id,image_url,image_type'
        ])->first();
        $categories = Category::get();
        $query = Product::with(['category:id,name', 'images:image_id,image_url,image_type']);
        if ($request->has('name_search')) {
            $query->where('name', 'like', '%' . $request->name_search . '%');
        }
        if ($request->has('category_id')) {
            $query->where('category_id',$request->category_id);
        }
        $listProduct = $query->paginate(10);
        return view('user.product.list-product')->with([
            'listProduct' => $listProduct,
            'categories' => $categories,
            'cart'=>$cart
        ]);
    }
    // bắt bằng param tìm bằng tên sản phẩm
    public function searchProduct(Request $request){
        return redirect()->route('user.product.listProductsUser',['name_search' => $request->name_search]);
    }
 // bắt bằng param tìm bằng danh mục sản phẩm
    public function searchCategory(Request $request){
        return redirect()->route('user.product.listProductsUser',['category_id' => $request->category_id]);
    }
    // chi tiết sản phẩm
    public function detaiProduct($idProduct){
        $cart= Cart::with([
            'cart_details:id,cart_id,product_id,quantity',
            'cart_details.product:id,name,price,description,category_id',
            'cart_details.product.category:id,name',
            'cart_details.product.images:image_id,image_url,image_type'
        ])->first();
        $product = Product::with(['images:image_id,image_url,image_type', 'category:id,name','cart_detail:id,cart_id,product_id,quantity'])
        ->find($idProduct);
        // dd($cart->user_id);
        return view('user.product.detail-product')->with([
            'product' => $product,
            'cart'=>$cart
        ]);
    }
}

