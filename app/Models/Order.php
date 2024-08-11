<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
        'user_id',
        'country',
        'first_name',
        'last_name',
        'email',
        'company_name',
        'address',
        'street_address',
        'city',
        'state_county',
        'postcode',
        'phone',
        'total_price',
        'payment_method',
        'payment_id',
        'status',
        'tracking_no',
    ];

    public function items()
        {
            return $this->hasMany(OrderItem::class);
        }
}
