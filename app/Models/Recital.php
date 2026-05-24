<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recital extends Model
{      
    protected $fillable = [
    'name',
    'event_date',
    'location',
    'ticket_price',
    'additional_info',
];

    public function presaleOrders()
    {
        return $this->hasMany(PresaleOrder::class);
    }

    public function doorSales()
    {
        return $this->hasMany(DoorSale::class);
    }
}
