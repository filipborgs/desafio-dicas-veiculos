<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Vehicle::class);
    }
}
