<?php

declare(strict_types=1);

namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ORM\Entity
 */

class Property
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
     * @ORM\Column(unique=true)
     * @SerializedName("@internal-id")
     */
    private $code;

    /**
     * @var Type
     * @ORM\ManyToOne(targetEntity="Type")
     */
    private $type;

    /**
     * @var PropertyType
     * @ORM\ManyToOne(targetEntity="PropertyType")
     * @SerializedName("property-type")
     */
    private $propertyType;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="Category")
     */
    private $category;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(type="datetimetz")
     * @SerializedName("creation-date")
     */
    private $createdAt;

    /**
     * @var Location
     * @ORM\OneToOne(targetEntity="Location", cascade="persist")
     */
    private $location;

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getPropertyType(): PropertyType
    {
        return $this->propertyType;
    }

    public function setPropertyType(PropertyType $propertyType): void
    {
        $this->propertyType = $propertyType;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }

}