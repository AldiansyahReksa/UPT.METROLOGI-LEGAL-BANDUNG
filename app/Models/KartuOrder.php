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
    public function getFormattedIdAttribute()
    {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function numberToRoman($num) 
    {
        $romanArray = array(
            'XII'  => 12,
            'XI'   => 11,
            'X'    => 10,
            'IX'   => 9,
            'VIII' => 8,
            'VII'  => 7,
            'VI'   => 6,
            'V'    => 5,
            'IV'   => 4,
            'III'  => 3,
            'II'   => 2,
            'I'    => 1,
        );

        $result = '';

        foreach ($romanArray as $roman => $number) {
            while ($num >= $number) {
                $result .= $roman;
                $num -= $number;
            }
        }

        return $result;
    }
}
