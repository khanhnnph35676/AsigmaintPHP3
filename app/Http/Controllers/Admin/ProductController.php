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
        $data =[
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        $product = Product::create($data);
        if($request->hasFile('image_url')){
            $images = $request->file('image_url');
            foreach($images as $key => $image){
                $nameImage = time() . "_". uniqid() . $image->getClientOriginalExtension();
                $link = "img/prd/";
                $image->move(public_path($link), $nameImage);
                ProductImage::create([
                    'image_id' =>  $product->id,
                    'image_url' => $link.$nameImage,
                    'image_type' => $key == 0 ? 'main' : 'secondary'
                ]);
            }
        }
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
        $data =[
            'name'=> $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ];
        Product::where('id',$idProduct)->update($data);

        // $image = ProductImage::where('image_id',$idProduct)->first();
        // if(isset($image->image_url)){
        //     $imageUrl = $image->image_url;
        // }else{
        //     $imageUrl = '';
        // }
        // dd($image->image_url);
        if($request->hasFile('image_url')){
            $images = ProductImage::where('image_id',$idProduct)->get();
            foreach($images as $image){
                if($image->image_url !=null && $image->image_url != ''){
                    File::delete(public_path($image->image_url));
                    ProductImage::where('image_id',$idProduct)->delete();
                }
            }
            if($request->hasFile('image_url')){
                $images = $request->file('image_url');
                foreach($images as $key => $image){
                    $nameImage = time() . "_". uniqid() . $image->getClientOriginalExtension();
                    $link = "img/prd/";
                    $image->move(public_path($link), $nameImage);
                    ProductImage::create([
                        'image_id' =>  $idProduct,
                        'image_url' => $link.$nameImage,
                        'image_type' => $key == 0 ? 'main' : 'secondary'
                    ]);
                }
            }
        }
        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Sửa sản phẩm thành công'
        ]);
    }
}
