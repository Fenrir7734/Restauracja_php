<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartContent extends Model
{
    use HasFactory;
    protected  $table = 'cart_content';
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'cart_id', 'product_id', 'quantity', 'amount');

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
