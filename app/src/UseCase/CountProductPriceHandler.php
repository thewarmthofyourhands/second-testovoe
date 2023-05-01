<?php

namespace App\UseCase;

use App\Enums\CountryCodeEnum;
use App\Services\CountryDefinitionService;
use App\Services\PriceCalculationService;
use App\Services\ProductService;

class CountProductPriceHandler
{
    public function __construct(
        private readonly PriceCalculationService $priceCalculationService,
        private readonly ProductService $productService,
    ) {}

    public function handle(CountryCodeEnum $countryCodeEnum, int $productId): string
    {
        $productDto = $this->productService->getById($productId);

        return $this->priceCalculationService->calculateByCountryCode($productDto, $countryCodeEnum);
    }
}