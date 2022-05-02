<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParchaseProduct extends Model
{
    use HasFactory;

    protected $table = 'parchase_products';
    
    protected $fillable = [
        'custom_id',
        'buyer_id',
        'seller_id',
        'product_id',
        'is_parchase',
    ];

    public function selleruser() {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }

    public function buyeruser() {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
