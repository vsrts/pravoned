<?php

declare(strict_types=1);


namespace App\Realty\Dto;


use App\Entity\Realty\Category;
use App\Entity\Realty\Type;

class PropertySearchDto
{
    /**
     * @var Type
     */
    private $type;

    /**
     * @var Category
     */
    private $category;

    private $rooms;

    private $priceFrom;

    private $priceTo;

    public function attributeInArray(){
        $arrayAttributes = [];
        $attributesList = [
            'type',
            'category',
        ];
        foreach($attributesList as $attribute){
            if($this->{$attribute}){
                $arrayAttributes[$attribute] = $this->{$attribute};
            }
        }
        return $arrayAttributes;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): void
    {
        $this->type = $type;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getRooms()
    {
        return $this->rooms;
    }

    public function setRooms($rooms): void
    {
        $this->rooms = $rooms;
    }

    public function getPriceFrom()
    {
        return $this->priceFrom;
    }

    public function setPriceFrom($priceFrom): void
    {
        $this->priceFrom = $priceFrom;
    }

    public function getPriceTo()
    {
        return $this->priceTo;
    }

    public function setPriceTo($priceTo): void
    {
        $this->priceTo = $priceTo;
    }


}