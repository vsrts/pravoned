<?php

declare(strict_types=1);

namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups("import_denormalize")
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
     * @Groups("import_denormalize")
     */
    private $createdAt;

    /**
     * @var Location
     * @ORM\OneToOne(targetEntity="Location", cascade="persist")
     * @Groups("import_denormalize")
     */
    private $location;

    /**
     * @var Agent
     * @ORM\ManyToOne(targetEntity="Agent", cascade="persist")
     */
    private $agent;

    /**
     * @var Price
     * @ORM\OneToOne(targetEntity="Price", cascade="persist")
     * @Groups("import_denormalize")
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @Groups("import_denormalize")
     */
    private $description;

    /**
     * @var PropertyParams
     * @ORM\OneToOne(targetEntity="PropertyParams")
     */
    private $propertyParams;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     */
    private $mainImage;

    public function getshortDescription(): ?string
    {
        $shortDescription = ($this->description) ? mb_strimwidth($this->description, 0, 200, "...") : null;
        return $shortDescription;
    }

    public function getStringCreatedAt(){
        return $this->createdAt->format('d-m-Y');
    }

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

    public function getAgent(): Agent
    {
        return $this->agent;
    }

    public function setAgent(Agent $agent): void
    {
        $this->agent = $agent;
    }

    public function getPrice(): Price
    {
        return $this->price;
    }

    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPropertyParams(): ?PropertyParams
    {
        return $this->propertyParams;
    }

    public function setPropertyParams(PropertyParams $propertyParams): void
    {
        $this->propertyParams = $propertyParams;
    }

    public function getMainImage(): ?string
    {
        return $this->mainImage;
    }

    public function setMainImage(?string $mainImage): void
    {
        $this->mainImage = $mainImage;
    }

}