<?php

namespace App\Repositories;

use App\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;

abstract class BaseRepository
{
    protected $model;

    protected function __construct($class)
    {
        $this->model = app($class);
    }

    protected function validator($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->all());
        }
    }
}
