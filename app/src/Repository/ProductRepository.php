<?php

namespace App\Repository;

use App\Dto\ProductDto;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\Connection;

class ProductRepository
{
    private readonly Connection $connection;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->connection = $entityManager->getConnection();
    }

    /**
     * @throws Exception
     *
     * @return ProductDto[]
     */
    public function getList(): array
    {
        $stmt = $this->connection->createQueryBuilder()
            ->select('*')
            ->from('Product')
            ->executeQuery();
        $list = $stmt->fetchAllAssociative();

        foreach ($list as $key => $item) {
            $list[$key] = new ProductDto($item['id'], $item['name'], $item['price']);
        }

        return $list;
    }

    /**
     * @throws Exception
     *
     * @return ProductDto[]
     */
    public function getById(int $id): ProductDto
    {
        $stmt = $this->connection->createQueryBuilder()
            ->select('*')
            ->from('Product')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->executeQuery();
        $productData = $stmt->fetchAssociative();

        return new ProductDto($productData['id'], $productData['name'], $productData['price']);
    }
}