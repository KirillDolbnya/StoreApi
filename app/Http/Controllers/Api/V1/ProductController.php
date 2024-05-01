<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
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

        return ProductResource::collection($result->data);
    }

    public function getById($id)
    {
        dd($id);
    }
}
