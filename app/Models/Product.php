<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'weight',
        'value'
    ];

    public function getValueWeightRatioAttribute()
    {
        return $this->weight > 0 ? $this->value / $this->weight : 0;
    }
}
