<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'requestor_id',
    ];

    public function items()
    {
        return $this->hasMany(TransferItem::class, 'transfer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "transfer_items", "transfer_id", "product_id");
    }

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function approval()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
