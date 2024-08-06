<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_detail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartDetailRequest;

class CartController extends Controller
{
    // Thêm sản phẩm
    public function addToCart(Request $request){
        $request->validate([
            'quantity'=> 'required|integer|max:100|min:1'
        ],[
            'quantity.required' => 'Số lượng đang không có',
            'quantity.min' => 'Số lượng tối thiểu là 1',
            'quantity.max' => 'Số lượng tối đa là 100',
            'quantity.integer' => 'Số lượng phải là một số nguyên'
        ]);
        $check = Cart::where('user_id', Auth::id());
        if ($check->exists()) {
            $cart = Cart::first();
            $cart_detail = Cart_detail::where('cart_id', $cart->id)
                ->where('product_id', $request->idProduct);
            if ($cart_detail->exists()) {
                $cart_detail->update(
                    [
                        'quantity' => intval($cart_detail->first()->quantity) + intval($request->quantity)
                    ]
                );
            } else {
                $cart = Cart::first();
                $data = [
                    'cart_id' => $cart->id,
                    'product_id' => $request->idProduct,
                    'quantity' => $request->quantity
                ];
                $cart_detail->create($data);
            }
        } else {
            $newCart = Cart::create([
                'user_id' => Auth::id()
            ]);
            $data = [
                'cart_id' => $newCart->first()->id,
                'product_id' => $request->idProduct,
                'quantity' => $request->quantity
            ];
            Cart_detail::create($data);
        }
        return redirect()->back()->with([
            'message' => 'Thêm sản phẩm vào giỏ hàng thành công'
        ]);
    }
    // xem nhanh phần cart
    public function viewCart(){
        $cart= Cart::with([
            'cart_details:id,cart_id,product_id,quantity',
            'cart_details.product:id,name,price,description,category_id',
            'cart_details.product.category:id,name',
            'cart_details.product.images:image_id,image_url,image_type'
        ])->first();
        return view('user.cart')->with([
            'cart' => $cart
        ]);
    }

    public function updateCart(CartDetailRequest $request){
        foreach ($request->idCartDetail as $key => $value){
            Cart_detail::where('id', $value)->update([
                'quantity' => $request->quantity[$key]
            ]);
        }
        return redirect()->back()->with([
            'mes'=>'Sửa đơn hàng thành công'
        ]);
    }

    public function deleteCart(Request $request){
        Cart_detail::find($request->idCartDetail)->delete();
        return redirect()->back()->with([
             'mes'=>'Xoá đơn hàng thành công'
        ]);
    }
}
