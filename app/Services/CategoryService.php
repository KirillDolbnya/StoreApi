<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\Common\ServiceResult;

class CategoryService
{

    public function __construct(
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    public function getAll()
    {
        $result = $this->categoryRepository->getAll();

        return ServiceResult::createSuccessResult($result);
    }

    public function getById($id): ServiceResult
    {
        $result = $this->categoryRepository->getById($id);

        if (empty($result)){
            return ServiceResult::createErrorResult('Такой категории не существует');
        }

        return ServiceResult::createSuccessResult($result);
    }

    public function getCategoryProducts($id): ServiceResult
    {
        $result = $this->categoryRepository->getProducts($id);

        if(empty($result->toArray())){
            return ServiceResult::createErrorResult('По вашему запросу ничего не найдено');
        }

        return ServiceResult::createSuccessResult($result);
    }

}