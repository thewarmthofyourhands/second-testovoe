<?php

namespace App\HttpInput;

use App\Exceptions\ValidationException;
use Symfony\Component\HttpFoundation\Request;

class CountryProductPriceInput
{
    private readonly string $taxCode;
    private readonly int $productId;

    public function __construct(Request $request)
    {
        $this->taxCode = $this->validateTaxCode($request->get('taxCode'));
        $this->productId = $request->get('productId');
    }

    public function validateTaxCode(string $taxCode): string
    {
        if (1 === preg_match('/^[A-Z]{2,3}\d+$/', $taxCode, $matches)) {
            return $taxCode;
        }

        throw new ValidationException('taxCode');
    }

    public function getTaxCode(): string
    {
        return $this->taxCode;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}
