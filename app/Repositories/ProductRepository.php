<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{

    public function getModelQuery()
    {
        return Product::query();
    }

    public function getAll()
    {
        $result = $this->getModelQuery()->get();

        return $result;
    }

    public function getById($id)
    {
        $result = $this->getModelQuery()->where([
            'id' => $id
        ])->first();

        return $result;
    }

    public function getProductCategories($id)
    {
        return $this->getModelQuery()->find($id)->category()->get();
    }
}