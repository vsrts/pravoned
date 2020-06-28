<?php

declare(strict_types=1);

namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $studio;

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

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $phone;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $internet;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("room-furniture")
     */
    private $roomFurniture;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("rubbish-chute")
     */
    private $rubbishChute;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("with-children")
     */
    private $withChildren;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("with-pets")
     */
    private $withPets;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $refrigerator;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("washing-machine")
     */
    private $washingMachine;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $dishwasher;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $television;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("air-conditioner")
     */
    private $airConditioner;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $shower;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     */
    private $parcking;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @Groups("property_params")
     * @SerializedName("bathroom-unit")
     */
    private $bathroomUnit;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @Groups("property_params")
     * @SerializedName("window-view")
     */
    private $windowView;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @Groups("property_params")
     * @SerializedName("building-type")
     */
    private $buildingType;

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

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("rent-pledge")
     */
    private $rentPledge;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups("property_params")
     * @SerializedName("utilities-included")
     */
    private $utilitiesIncluded;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $buildYear;

    public function setNulls()
    {
        $this->rooms = null;
        $this->studio = null;
    }

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

    public function getPhone(): ?bool
    {
        return $this->phone;
    }

    public function setPhone(bool $phone): void
    {
        $this->phone = $phone;
    }

    public function isInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(bool $internet): void
    {
        $this->internet = $internet;
    }

    public function isRoomFurniture(): ?bool
    {
        return $this->roomFurniture;
    }

    public function setRoomFurniture(bool $roomFurniture): void
    {
        $this->roomFurniture = $roomFurniture;
    }

    public function isRubbishChute(): ?bool
    {
        return $this->rubbishChute;
    }

    public function setRubbishChute(bool $rubbishChute): void
    {
        $this->rubbishChute = $rubbishChute;
    }

    public function isWithChildren(): ?bool
    {
        return $this->withChildren;
    }

    public function setWithChildren(bool $withChildren): void
    {
        $this->withChildren = $withChildren;
    }

    public function isWithPets(): ?bool
    {
        return $this->withPets;
    }

    public function setWithPets(bool $withPets): void
    {
        $this->withPets = $withPets;
    }

    public function isRefrigerator(): ?bool
    {
        return $this->refrigerator;
    }

    public function setRefrigerator(bool $refrigerator): void
    {
        $this->refrigerator = $refrigerator;
    }

    public function isWashingMachine(): ?bool
    {
        return $this->washingMachine;
    }

    public function setWashingMachine(bool $washingMachine): void
    {
        $this->washingMachine = $washingMachine;
    }

    public function isDishwasher(): ?bool
    {
        return $this->dishwasher;
    }

    public function setDishwasher(bool $dishwasher): void
    {
        $this->dishwasher = $dishwasher;
    }

    public function isTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(bool $television): void
    {
        $this->television = $television;
    }

    public function isAirConditioner(): ?bool
    {
        return $this->airConditioner;
    }

    public function setAirConditioner(bool $airConditioner): void
    {
        $this->airConditioner = $airConditioner;
    }

    public function isShower(): ?bool
    {
        return $this->shower;
    }

    public function setShower(bool $shower): void
    {
        $this->shower = $shower;
    }

    public function isParcking(): ?bool
    {
        return $this->parcking;
    }

    public function setParcking(bool $parcking): void
    {
        $this->parcking = $parcking;
    }

    public function getBathroomUnit(): ?string
    {
        return $this->bathroomUnit;
    }

    public function setBathroomUnit(string $bathroomUnit): void
    {
        $this->bathroomUnit = $bathroomUnit;
    }

    public function getWindowView(): ?string
    {
        return $this->windowView;
    }

    public function setWindowView(string $windowView): void
    {
        $this->windowView = $windowView;
    }

    public function getBuildingType(): ?string
    {
        return $this->buildingType;
    }

    public function setBuildingType(string $buildingType): void
    {
        $this->buildingType = $buildingType;
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

    public function getRentPledge(): ?bool
    {
        return $this->rentPledge;
    }

    public function setRentPledge(bool $rentPledge): void
    {
        $this->rentPledge = $rentPledge;
    }

    public function getUtilitiesIncluded(): ?bool
    {
        return $this->utilitiesIncluded;
    }

    public function setUtilitiesIncluded(bool $utilitiesIncluded): void
    {
        $this->utilitiesIncluded = $utilitiesIncluded;
    }

    public function getBuildYear(): ?int
    {
        return $this->buildYear;
    }

    public function setBuildYear(int $buildYear): void
    {
        $this->buildYear = $buildYear;
    }

    public function getStudio(): ?bool
    {
        return $this->studio;
    }

    public function setStudio(bool $studio): void
    {
        $this->studio = $studio;
    }

}