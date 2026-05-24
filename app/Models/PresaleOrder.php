<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresaleOrder extends Model
{
    public function recital()
    {
        return $this->belongsTo(Recital::class);
    }
}
