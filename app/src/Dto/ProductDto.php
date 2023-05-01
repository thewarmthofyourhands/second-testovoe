<?php

namespace App\Dto;

class ProductDto
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly string $price,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }
}
