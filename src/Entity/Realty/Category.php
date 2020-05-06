<?php

declare(strict_types=1);


namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Category
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column
     */
    private $categoryName;

    public function __construct(string $categoryName = null)
    {
        $this->categoryName = $categoryName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

}