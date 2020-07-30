<?php

declare(strict_types=1);


namespace App\Realty\Dto;


class PropertySearchDto
{
    private $type;

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }


}