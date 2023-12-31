<?php

namespace App\Models;

use App\Models\Order;
use App\Models\KartuOrder;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kartu extends Model
{
    use HasFactory;

    public function kartuOrders()
    {
        return $this->hasMany(KartuOrder::class);
    }

    protected $fillable = [
        'order_id', 'zero', 'minimum', 'bkd1', 'bkd2', 'bkd3',
        'penunjukanzero', 'penunjukanminimum', 'penunjukanbkd1', 'penunjukanbkd2', 'penunjukanbkd3'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
