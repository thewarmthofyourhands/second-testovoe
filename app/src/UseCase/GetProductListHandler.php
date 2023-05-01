<?php

namespace App\UseCase;

use App\Services\ProductService;

class GetProductListHandler
{
    public function __construct(
        private readonly ProductService $productService,
    ) {}

    public function handle(): array
    {
        return $this->productService->getList();
    }
}