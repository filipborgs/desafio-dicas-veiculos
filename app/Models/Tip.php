<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'tip', 'id_user', 'id_vehicle'
    ];

    public function rules()
    {
        return [
            'title' => 'required',
            'tip' => 'required',
            'id_user' => 'required',
            'id_vehicle' => 'required'
        ];
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'id_vehicle');
    }
}
