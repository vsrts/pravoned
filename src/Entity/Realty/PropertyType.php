<?php

declare(strict_types=1);

namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PropertyType
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
     * @ORm\Column
     */
    private $propertyTypeName;

    public function __construct(string $propertyTypeName = null)
    {
        $this->propertyTypeName = $propertyTypeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPropertyTypeName(): string
    {
        return $this->propertyTypeName;
    }

    /**
     * @param string $propertyTypeName
     */
    public function setPropertyTypeName(string $propertyTypeName): void
    {
        $this->propertyTypeName = $propertyTypeName;
    }

}