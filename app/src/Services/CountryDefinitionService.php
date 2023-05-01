<?php

namespace App\Services;

use App\Enums\CountryCodeEnum;
use Exception;

class CountryDefinitionService
{
    public function defineByTaxCode(string $taxCode): CountryCodeEnum
    {
        if (1 === preg_match('/^([A-Z]{2,3})(\d+)$/', $taxCode, $matches)) {
            [$subject, $countryCode, $serialNumber] = $matches;

            return CountryCodeEnum::from($countryCode);
        }

        throw new Exception('Wrong format of tax code');
    }
}
