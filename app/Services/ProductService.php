<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Common\ServiceResult;

class ProductService
{

    public function __construct(
        private readonly ProductRepository $productRepository
    )
    {
    }

    public function getAll(): ServiceResult
    {
        $result = $this->productRepository->getAll();

        if (empty($result)){
            return ServiceResult::createErrorResult('Товаров нет');
        }

        return ServiceResult::createSuccessResult($result);
    }

//    public function getById()
//    {
//
//    }

}