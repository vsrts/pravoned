<?php

declare(strict_types=1);


namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */

class Type
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
    private $typeName;

    /**
     * @var string
     * @Gedmo\Slug(fields={"typeName"})
     * @ORM\Column(nullable=true)
     */
    private $alias;

    public function __construct($typeName = null)
    {
        $this->typeName = $typeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

}