<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Product")
 * @ORM\Entity()
 */
class ProductEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column(type="bigint", nullable=false, options={"unsigned": true})
     */
    private int $id;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private string $price;

    /**
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    private \DateTime $updatedAt;
}
