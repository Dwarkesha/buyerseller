<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'custom_id',
        'name',
        'price',
        'user_id',
        'category_id',
        'image',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parchase()
	{
		return $this->hasOne(ParchaseProduct::class);
	}
}
