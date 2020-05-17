<?php

declare(strict_types=1);


namespace App\Entity\Realty;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 */

class Price
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @Groups("import_denormalize")
     * @SerializedName("value")
     */
    private $priceValue;

    /**
     * @var string
     * @ORM\Column(nullable=true)
     * @Groups("import_denormalize")
     */
    private $period;

    public function getId(): int
    {
        return $this->id;
    }

    public function getPriceValue(): int
    {
        return $this->priceValue;
    }

    public function setPriceValue(int $priceValue): void
    {
        $this->priceValue = $priceValue;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function setPeriod(string $period): void
    {
        $this->period = $period;
    }

}