<?php

declare(strict_types=1);


namespace App\Controller\Realty;

use App\Controller\BaseController;
use App\Entity\Realty\Property;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertySearchController extends BaseController
{

    /**
     * @Route("/search", name="property_search")
     */
    public function searchResult(Request $request){

        $formData = $this->getFormData($request);

        $findArray = $formData->attributeInArray();

        $propertyRepository = $this->getRepository(Property::class);
        $propertyObjectList = $propertyRepository->findBy($findArray);

        $contents = $this->getContent(
            'realty/category_items_list.html.twig',
            ['properties' => $propertyObjectList],
            ['propertySearchForm' => true]
        );

        return new Response($contents);
    }
}