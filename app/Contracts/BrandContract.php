<?php

namespace App\Contracts;

interface BrandContract
{
    public function search($search);

    public function save($brand);
}
