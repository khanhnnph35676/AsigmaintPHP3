<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_detail extends Model
{
    use HasFactory;
    protected $table = 'cart_detail';
    public $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function cart(){
        return $this->belongsTo(Cart::class,'cart_id','id');
    }
}