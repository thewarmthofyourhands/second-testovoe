<?php

namespace App\Controller;

use App\Exceptions\ValidationException;
use App\HttpInput\CountryProductPriceInput;
use App\UseCase\CountProductPriceHandler;
use App\UseCase\DefineCountryCodeByTaxCodeHandler;
use App\UseCase\GetProductListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function __construct(
        private readonly GetProductListHandler $getProductListHandler,
        private readonly DefineCountryCodeByTaxCodeHandler $defineCountryCodeByTaxCodeHandler,
        private readonly CountProductPriceHandler $countProductPriceHandler,
    ) {}

    public function index(): Response
    {
        $productDtoList = $this->getProductListHandler->handle();

        return $this->render('index.html.twig', [
            'productDtoList' => $productDtoList,
        ]);
    }

    public function countProductPrice(Request $request): Response
    {
        try {
            $productDtoList = $this->getProductListHandler->handle();
            $countProductPriceInput = new CountryProductPriceInput($request);
            $countryCodeEnum = $this->defineCountryCodeByTaxCodeHandler->handle($countProductPriceInput->getTaxCode());
            $price = $this->countProductPriceHandler->handle($countryCodeEnum, $countProductPriceInput->getProductId());

            return $this->render('index.html.twig', [
                'productDtoList' => $productDtoList,
                'price' => $price,
                'country' => $countryCodeEnum->value,
            ]);
        } catch (ValidationException $e) {
            $productDtoList = $this->getProductListHandler->handle();

            return $this->render('index.html.twig', [
                'productDtoList' => $productDtoList,
                'errorFormList' => [
                    $e->getFieldName() => 'Некорректный формат tax кода',
                ],
            ]);
        }
    }
}
