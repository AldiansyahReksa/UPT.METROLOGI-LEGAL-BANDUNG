<?php

namespace App\Models;

use App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kartu extends Model
{
    use HasFactory;

    public function orders(): HasMany
    {

        return $this->hasMany(Order::class);
    }
    
}
