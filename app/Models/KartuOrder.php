<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KartuOrder extends Model
{
    use HasFactory;

    public function kartu()
{
    return $this->belongsTo(Kartu::class);
}

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
