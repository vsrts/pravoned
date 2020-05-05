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
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(unique=true)
     * @SerializedName("@internal-id")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     */
    private $type;

    public function getId(): int
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

}