<?php

namespace App\Repositories;

use App\Contracts\VehicleContract;
use App\Models\Vehicle;

class VehicleRepository extends BaseRepository implements VehicleContract
{
    public function __construct()
    {
        parent::__construct(Vehicle::class);
    }

    public function save($data)
    {
        $this->validator($data, $this->model->rules());
        $veihcle = $this->model->fill($data);
        $veihcle->save();
        return $veihcle;
    }
}
