<?php

namespace App\Services;

use App\Dto\ProductDto;
use App\Enums\CountryCodeEnum;

class PriceCalculationService
{
    private function getTaxPercentByCountryCodeEnum(CountryCodeEnum $countryCodeEnum): string
    {
        return match ($countryCodeEnum->value) {
            CountryCodeEnum::DE->value => '1.19',
            CountryCodeEnum::IT->value => '1.22',
            CountryCodeEnum::GR->value => '1.24',
        };
    }

    public function calculateByCountryCode(ProductDto $productDto, CountryCodeEnum $countryCodeEnum): string
    {
        $taxPercent = $this->getTaxPercentByCountryCodeEnum($countryCodeEnum);

        return bcmul($productDto->getPrice(), $taxPercent, 2);
    }
}
