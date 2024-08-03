<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Http\Requests\ProductAdminRequest;
class ProductController extends Controller
{
    // list
    public function listProducts(){
        $listProduct = Product::with(['category:id,name', 'images:image_id,image_url,image_type'])->paginate(5);
        return view('admin.products.list-product')->with([
            'listProduct' => $listProduct
        ]);
    }
    //add
    public function addProduct(){
        $images = ProductImage::get();
        $listCategories = Category::get();
        return view('admin.products.add-product')->with([
          'listCategories'=>$listCategories,
          'images'=>$images
        ]);
    }

    public function addPostProduct(ProductAdminRequest $request){
        $imageUrl = '';
        if($request->hasFile('image_url')){
            $image = $request->file('image_url');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "img/prd/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data =[
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        Product::create($data);
        $newProduct = Product::where('name',$request->name)->first();
        // dd($newProduct->id);
        $dataImage =[
            'image_id' =>  $newProduct->id,
            'image_url' => $imageUrl,
            'image_type' => 'main'
        ];
        ProductImage::create($dataImage);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    // delete
    public function deleteProduct(Request $request){
        $product = Product::find($request->idProduct);
        $images = ProductImage::where('image_id',$request->idProduct)->get();
        foreach($images as $image){
            if($image->image_url !=null && $image->image_url != ''){
                File::delete(public_path($image->image_url));
                ProductImage::where('image_id',$request->idProduct)->delete();
            }
        }
        $product->delete();
        return redirect()->back()->with([
            'message'=>'Xoá thành công'
        ]);
    }
    // update
    public function updateProduct($idProduct){
        $detailProduct = Product::find($idProduct);
        $images = ProductImage::get();
        $listCategories = Category::get();
        return view('admin.products.update-product')->with([
            'detailProduct'=>$detailProduct,
            'listCategories'=>$listCategories,
            'images'=>$images
        ]);
    }

    public function updatePostProduct($idProduct,ProductAdminRequest $request){
        $image = ProductImage::where('image_id',$idProduct)->first();

        if(isset($image->image_url)){
            $imageUrl = $image->image_url;
        }else{
            $imageUrl = '';
        }
        // dd($image->image_url);
        if($request->hasFile('image_url')){
            $images = ProductImage::where('image_id',$idProduct)->get();
            foreach($images as $image){
                if($image->image_url !=null && $image->image_url != ''){
                    File::delete(public_path($image->image_url));
                    ProductImage::where('image_id',$idProduct)->delete();
                }
            }
            $image = $request->file('image_url');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "img/prd/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }

        $data =[
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        Product::where('id',$idProduct)->update($data);
        $dataImage =[
            'image_id' =>  $request->idProduct,
            'image_url' => $imageUrl,
            'image_type' => 'main'
        ];
        ProductImage::create($dataImage);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Cập nhật sản phẩm thành công'
        ]);
    }
}
