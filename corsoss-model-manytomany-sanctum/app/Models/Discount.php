<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discount extends Model
{
    use HasFactory;
    
    public function order_details():HasMany {
        return $this->hasMany(OrderDetail::class);
    }
    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'order_details', 'discount_id', 'product_id');
    }
}
