<?php

namespace App\Services;

use App\Dto\ProductDto;
use App\Repository\ProductRepository;
use Doctrine\DBAL\Exception;

class ProductService
{
    public function __construct(
        private readonly ProductRepository $productRepository,
    ) {}

    /**
     * @throws Exception
     *
     * @return ProductDto[]
     */
    public function getList(): array
    {
        return $this->productRepository->getList();
    }

    public function getById(int $id): ProductDto
    {
        return $this->productRepository->getById($id);
    }
}
