<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResourceCollection;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
        private readonly ProductService $productService
    )
    {
    }

    public function getAll()
    {
        $result = $this->productService->getAll();

        if($result->isError){
            return response()->json($result->message);
        }

        return new ProductResourceCollection($result->data);
    }

    public function getById($id)
    {
       $result = $this->productService->getById($id);

        if($result->isError){
            return response()->json($result->message);
        }

        return new ProductResource($result->data);
    }

    public function getProductCategories($id)
    {
        $result = $this->productService->getProductCategories($id);

        if ($result->isError){
            return response()->json($result->message);
        }

        return new CategoryResourceCollection($result->data);
    }
}
