<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresaleOrder extends Model
{
    protected $fillable = [
    'recital_id',
    'customer_name',
    'customer_email',
    'ticket_quantity',
    'total_amount',
    'order_number',
    'qr_code',
    'is_used',
];

    public function recital()
    {
        return $this->belongsTo(Recital::class);
    }
}
