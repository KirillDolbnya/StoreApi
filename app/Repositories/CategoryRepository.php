<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{

    public function getModelQuery()
    {
        return Category::query();
    }

    public function getAll()
    {
        return $this->getModelQuery()->get();
    }

    public function getById($id)
    {
        return $this->getModelQuery()->where([
            'id' => $id
        ])->first();
    }

    public function getProducts($id)
    {
        return $this->getModelQuery()->find($id)->getModel()->product()->get();
    }

}