<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorSale extends Model
{
    public function recital()
    {
        return $this->belongsTo(Recital::class);
    }
}
