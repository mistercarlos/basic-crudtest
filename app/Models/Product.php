<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function transfer()
    {
        return $this->belongsToMany(Transfer::class, "transfer_items", "product_id", "transfer_id");
    }
}
