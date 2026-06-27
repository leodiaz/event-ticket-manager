<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorSale extends Model
{
    protected $fillable = [
        'recital_id',
        'customer_name',
        'ticket_quantity',
        'payment_method',
        'total_amount',
    ];

    public function recital()
    {
        return $this->belongsTo(Recital::class);
    }
}