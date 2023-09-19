<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'admin_id', 'total_price', 'note', 'status', 'receiver_name', 'receiver_phone', 'receiver_address', 'created_at', 'updated_at'];
}
