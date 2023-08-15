<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function kartuOrder()
{
    return $this->belongsTo(KartuOrder::class);
}

public function getFormattedIdAttribute()
{
    return str_pad($this->id, 5, '0', STR_PAD_LEFT);
}
}
