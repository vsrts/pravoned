<?php

declare(strict_types=1);

namespace App\Controller\Realty;

use App\Controller\BaseController;
use App\Entity\Company;
use App\Entity\Realty\Property;
use Symfony\Component\Routing\Annotation\Route;

class PropertyItem extends BaseController
{
    const GALLERY_DESTINATION = 'images/realty-gallery/';

    /**
     * @Route("/{alias}/{code}", name="property_item")
     */
    public function propertyItem(string $code){
        $propertyRepository = $this->getRepository(Property::class);

        $propertyObject = $propertyRepository->findOneBy(['code' => $code]);

        $propertyCode = $propertyObject->getCode();
        $structure = self::GALLERY_DESTINATION . $propertyCode;
        $localImagesList = [];
        if(is_dir($structure)){
            $localImagesList = array_diff(scandir($structure), ['..', '.', 'thumb']);
        }


        return $this->render('realty/property_item.html.twig', [
            'property' => $propertyObject,
            'company' => $this->getCompanyData(),
            'imageGallery' => $localImagesList,
        ]);
    }

}