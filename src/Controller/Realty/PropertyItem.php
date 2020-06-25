<?php

declare(strict_types=1);


namespace App\Controller\Realty;


use App\Entity\Company;
use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyItem extends AbstractController
{
    const COMPANY_ID = 1;
    const GALLERY_DESTINATION = 'images/realty-gallery/';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/{alias}/{code}", name="property_item")
     */
    public function propertyItem(Category $category, string $code){
        $propertyRepository = $this->em->getRepository(Property::class);
        $companyRepository = $this->em->getRepository(Company::class);

        $propertyObject = $propertyRepository->findOneBy(['code' => $code]);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        $propertyCode = $propertyObject->getCode();
        $structure = self::GALLERY_DESTINATION . $propertyCode;
        $localImagesList = array_diff(scandir($structure), ['..', '.', 'thumb']);

        return $this->render('realty/property_item.html.twig', [
            'property' => $propertyObject,
            'company' => $companyObject,
            'imageGallery' => $localImagesList,
        ]);
    }

}