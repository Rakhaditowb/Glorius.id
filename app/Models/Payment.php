<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'name',
        'image',
        'qr_image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
