<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function brand(){
        return $this->belongsTo(Brand::class);
    }
    function categories(){
        return $this->belongsTo(Categories::class);
    }
    protected $table = 'products';
    public $timestamps = true;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'name',
        'cost',
        'price',
        'quantity',
        'brand_id',
        'categories_id'
    ];
}
