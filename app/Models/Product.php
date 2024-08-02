<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\ForeignKeyDefinition;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $fillable = [
        'name',
        'price',
        'description',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'image_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
