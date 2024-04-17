<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    public function discount(): BelongsTo{
        return $this->belongsTo(Discount::class);
    }
    public function product(): BelongsTo{
        return $this->belongsTo(Product::class);
    }
    public function order(): BelongsTo{
        return $this->belongsTo(Order::class);
    }
}
