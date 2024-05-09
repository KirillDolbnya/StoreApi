<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryResourceCollection;
use App\Http\Resources\ProductResourceCollection;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService,
    )
    {
    }

    public function getAll()
    {
        $result = $this->categoryService->getAll();

        if ($result->isError){
            return response()->json($result->message);
        }

        return new CategoryResourceCollection($result->data);
    }


    public function getById($id)
    {

        $result = $this->categoryService->getById($id);

        if ($result->isError){
            return response()->json($result->message);
        }

        return new CategoryResource($result->data);
    }

    public function getCatProducts($id)
    {
        $result = $this->categoryService->getCatProducts($id);

        if($result->isError){
            return response()->json($result->message);
        }

        return new ProductResourceCollection($result->data);
    }
}
