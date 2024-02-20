<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "order_id",
        "user_id",
        "user_phone",
        "user_addresses_title",
        "user_full_shipping_and_billing_details_info",
        "purchased_date",
        "edd",
        "order_status",
        "transaction_id"
    ];
}
