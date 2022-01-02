<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected  $table = 'cart';
    protected $primaryKey = 'id';
    protected $fillable = array('id', 'user_id', 'address_id', 'description', 'status', 'amount', 'ordered_at', 'delivered_at');

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }

    public function content() {
        return $this->hasMany(CartContent::class);
    }

}

