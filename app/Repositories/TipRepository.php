<?php

namespace App\Repositories;

use App\Models\Tip;

class TipRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Tip::class);
    }
}
