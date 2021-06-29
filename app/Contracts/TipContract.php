<?php

namespace App\Contracts;

interface TipContract
{
    public function search($search, $type);

    public function save($tip);
}
