<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderslist extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
