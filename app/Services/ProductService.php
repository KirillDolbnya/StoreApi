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

        if (empty($result->toArray())){
            return ServiceResult::createErrorResult('Товаров нет');
        }

        return ServiceResult::createSuccessResult($result);
    }

    public function getById($id): ServiceResult
    {
        $result = $this->productRepository->getById($id);

        if(empty($result)){
            return ServiceResult::createErrorResult('Такого товара не существует');
        }

        return ServiceResult::createSuccessResult($result);
    }

}