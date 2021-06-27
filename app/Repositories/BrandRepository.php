<?php

namespace App\Repositories;

use App\Contracts\BrandContract;
use App\Models\Brand;

class BrandRepository extends BaseRepository implements BrandContract
{
    public function __construct()
    {
        parent::__construct(Brand::class);
    }

    public function search($search)
    {
        return $this->model->where('description', 'ILIKE', "%$search%")->get();
    }
}
