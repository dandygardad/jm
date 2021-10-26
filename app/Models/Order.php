<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderlist() {
        return $this->belongsTo(Orderslist::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
