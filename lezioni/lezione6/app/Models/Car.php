<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'hp', 'brand_id'];
    //relazioni
    //one to one HasOne
    //one to many HasMany | BelongsTo
    //many to many BelongsToMany
    public function brand():BelongsTo {
        return $this->belongsTo(Brand::class);
    }
}
