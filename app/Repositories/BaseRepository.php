<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    protected function __construct($class)
    {
        $this->model = app($class);
    }
}
