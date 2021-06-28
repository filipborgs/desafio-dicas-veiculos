<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function brand()
    {
        return $this->hasMany(Vehicle::class, 'id', 'id_brand');
    }
}
