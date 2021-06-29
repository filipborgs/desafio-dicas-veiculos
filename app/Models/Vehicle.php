<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'type', 'model', 'version', 'id_brand'
    ];

    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required|in:CAR,MOTORCYCLE,TRUCK',
            'model' => 'required',
            'id_brand' => 'required'
        ];
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'id_brand');
    }
}
