<?php

namespace App\Repositories;

use App\Contracts\TipContract;
use App\Models\Tip;

class TipRepository extends BaseRepository implements TipContract
{
    public function __construct()
    {
        parent::__construct(Tip::class);
    }

    public function search($search, $type = '')
    {
        $fnFilter = function ($query) use ($search) {
            return $query->where('name', 'ILIKE', "%$search%");
        };

        $query = $this->model->with('user:id,name,email', 'vehicle', 'vehicle.brand')
            ->where(function ($query) use ($search, $fnFilter) {
                $query->where('title', 'ILIKE', "%$search%")
                    ->orWhereHas('vehicle.brand', $fnFilter)
                    ->orWhereHas('user', $fnFilter);
            });

        if (in_array(strtoupper($type), ['CAR', 'MOTORCYCLE', 'TRUCK'])) {
            $query->whereHas('vehicle', function ($query) use ($type) {
                return $query->where('type', $type);
            });
        }

        return $query->get();
    }

    public function save($data)
    {
        $this->validator($data, $this->model->rules());
        $tip = $this->model->fill($data);
        $tip->save();
        return $tip;
    }
}
