<?php

declare(strict_types=1);

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Groups;

namespace App\Entity\Realty;

/**
 * @ORM\Entity
 */
class PropertyParams
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
     * @ORM\Column(nullable=true)
     * @Groups("property_params")
     */
    private $renovation;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("new-flat")
     */
    private $newFlat;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @SerializedName("deal-status")
     * @Groups("property_params")
     */
    private $dealStatus;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @SerializedName("building-name")
     * @Groups("property_params")
     */
    private $buildingName;

    /**
     * @var int
     * @ORM\Column(type= "integer", nullable=true)
     * @Groups("property_params")
     */
    private $rooms;

    /**
     * @var int
     * @ORM\Column(type= "integer", nullable=true)
     * @Groups("property_params")
     */
    private $floor;

    /**
     * @var int
     * @ORM\Column(type= "integer", nullable=true)
     * @Groups("property_params")
     * @SerializedName("floors-total")
     */
    private $floorsTotal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRenovation(): ?string
    {
        return $this->renovation;
    }

    public function setRenovation(string $renovation): void
    {
        $this->renovation = $renovation;
    }

    public function isNewFlat(): ?bool
    {
        return $this->newFlat;
    }

    public function setNewFlat(bool $newFlat): void
    {
        $this->newFlat = $newFlat;
    }

    public function getDealStatus(): ?string
    {
        return $this->dealStatus;
    }

    public function setDealStatus(string $dealStatus): void
    {
        $this->dealStatus = $dealStatus;
    }

    public function getBuildingName(): ?string
    {
        return $this->buildingName;
    }

    public function setBuildingName(string $buildingName): void
    {
        $this->buildingName = $buildingName;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): void
    {
        $this->rooms = $rooms;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): void
    {
        $this->floor = $floor;
    }

    public function getFloorsTotal(): ?int
    {
        return $this->floorsTotal;
    }

    public function setFloorsTotal(int $floorsTotal): void
    {
        $this->floorsTotal = $floorsTotal;
    }


}