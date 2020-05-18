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
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @SerializedName("deal-status")
     * @Groups("import_denormalize")
     */
    private $dealStatus;

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
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buildYear;

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
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("import_denormalize")
     * @SerializedName("rent-pledge")
     */
    private $rentPledge;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("import_denormalize")
     * @SerializedName("utilities-included")
     */
    private $utilitiesIncluded;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     * @Groups("import_denormalize")
     */
    private $description;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $area;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $livingSpace;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     */
    private $kitchenSpace;

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

    public function getBuildYear(): ?int
    {
        return $this->buildYear;
    }

    public function setBuildYear(int $buildYear): void
    {
        $this->buildYear = $buildYear;
    }

    public function getRentPledge(): ?bool
    {
        return $this->rentPledge;
    }

    public function setRentPledge(bool $rentPledge): void
    {
        $this->rentPledge = $rentPledge;
    }

    public function isUtilitiesIncluded(): ?bool
    {
        return $this->utilitiesIncluded;
    }

    public function setUtilitiesIncluded(bool $utilitiesIncluded): void
    {
        $this->utilitiesIncluded = $utilitiesIncluded;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(float $area): void
    {
        $this->area = $area;
    }

    public function getLivingSpace(): ?float
    {
        return $this->livingSpace;
    }

    public function setLivingSpace(float $livingSpace): void
    {
        $this->livingSpace = $livingSpace;
    }

    public function getKitchenSpace(): ?float
    {
        return $this->kitchenSpace;
    }

    public function setKitchenSpace(float $kitchenSpace): void
    {
        $this->kitchenSpace = $kitchenSpace;
    }

    public function getDealStatus(): ?string
    {
        return $this->dealStatus;
    }

    public function setDealStatus(string $dealStatus): void
    {
        $this->dealStatus = $dealStatus;
    }


}