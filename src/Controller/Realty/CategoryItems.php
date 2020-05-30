<?php

declare(strict_types=1);


namespace App\Controller\Realty;


use App\Entity\Company;
use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use App\Entity\Realty\Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryItems extends AbstractController
{
    const COMPANY_ID = 1;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/{type}/{alias}", name="category_items")
     */
    public function categoryItemsList(string $type, Category $category){
        $propertyRepository = $this->em->getRepository(Property::class);
        $typeRepository = $this->em->getRepository(Type::class);
        $companyRepository = $this->em->getRepository(Company::class);

        $typeObject = $typeRepository->findOneBy(['alias' => $type]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $typeObject, 'category' => $category]);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
            ]);
    }
}