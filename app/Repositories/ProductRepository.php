<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public function getModel()
    {
        return Product::query();
    }

    public function getAll()
    {
        $result = $this->getModel()->get();

        return $result;
    }

    public function getById($id)
    {

    }
}