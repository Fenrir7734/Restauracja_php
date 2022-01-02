<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected  $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'user_id', 'first_name', 'last_name', 'street', 'house', 'flat', 'post_code', 'city', 'phone');

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }
}
