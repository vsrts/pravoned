<?php

declare(strict_types=1);

namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 */

class Location
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
     * @Groups("import_denormalize")
     */
    private $country;

    /**
     * @var string
     * @ORM\Column
     * @Groups("import_denormalize")
     */
    private $region;

    /**
     * @var string
     * @ORM\Column
     * @SerializedName("locality-name")
     * @Groups("import_denormalize")
     */
    private $localityName;

    /**
     * @var string|null
     * @ORM\Column
     * @Groups("import_denormalize")
     */
    private $address;

    /**
     * @var float
     * @ORM\Column(type="float")
     * @Groups("import_denormalize")
     */
    private $latitude;

    /**
     * @var float
     * @ORM\Column(type="float")
     * @Groups("import_denormalize")
     */
    private $longitude;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getLocalityName(): string
    {
        return $this->localityName;
    }

    public function setLocalityName(string $localityName): void
    {
        $this->localityName = $localityName;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }




}