<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\User;

class ProuductController extends Controller
{
    public function homeProducts(){
        $listProduct = Product::with(['category:id,name', 'images:image_id,image_url,image_type'])->paginate(5);
        return view('user.home')->with([
            'listProduct' => $listProduct
        ]);
    }
    public function listProductsUser(Request $request){
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
            'categories' => $categories
        ]);
    }
    // bắt bằng param
    public function searchProduct(Request $request){
        return redirect()->route('user.product.listProductsUser',['name_search' => $request->name_search]);
    }
    public function searchCategory(Request $request){
        return redirect()->route('user.product.listProductsUser',['category_id' => $request->category_id]);
    }
    public function detaiProduct($idProduct){
        return view('user.product.detail-product');
    }
}
