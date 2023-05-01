<?php

namespace App\UseCase;

use App\Enums\CountryCodeEnum;
use App\Services\CountryDefinitionService;

class DefineCountryCodeByTaxCodeHandler
{
    public function __construct(
        private readonly CountryDefinitionService $countryDefinitionService,
    ) {}

    public function handle(string $taxCode): CountryCodeEnum
    {
        return $this->countryDefinitionService->defineByTaxCode($taxCode);
    }
}
