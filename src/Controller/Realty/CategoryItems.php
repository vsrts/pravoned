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
     * @Route("/{alias}/{category}", name="category_items", requirements={"alias"="sale|rent"})
     */
    public function categoryItemsList(Type $type, string $category){
        $propertyRepository = $this->em->getRepository(Property::class);
        $categoryRepository = $this->em->getRepository(Category::class);
        $companyRepository = $this->em->getRepository(Company::class);

        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject]);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
            ]);
    }
}