<?php

declare(strict_types=1);


namespace App\Controller\Realty;


use App\Entity\Company;
use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use App\Entity\Realty\PropertyParams;
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
     * @Route("/{alias}/{category}", name="category_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryItemsList(Type $type, string $category){
        $propertyRepository = $this->em->getRepository(Property::class);
        $categoryRepository = $this->em->getRepository(Category::class);
        $companyRepository = $this->em->getRepository(Company::class);

        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject], ['createdAt' => 'DESC']);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
            ]);
    }

    /**
     * @Route("/{alias}/{category}/{num}-room", name="category_param_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryParamItemsList(Type $type, string $category, int $num){
        $propertyRepository = $this->em->getRepository(Property::class);
        $categoryRepository = $this->em->getRepository(Category::class);
        $companyRepository = $this->em->getRepository(Company::class);
        $propertyParamsRepository = $this->em->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['rooms' => $num]);
        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject, 'propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
        ]);
    }

    /**
     * @Route("/{alias}/{category}/studio", name="category_studio_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryStudioItemsList(Type $type, string $category){
        $propertyRepository = $this->em->getRepository(Property::class);
        $categoryRepository = $this->em->getRepository(Category::class);
        $companyRepository = $this->em->getRepository(Company::class);
        $propertyParamsRepository = $this->em->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['studio' => true]);
        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject, 'propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
        ]);
    }

    /**
     * @Route("/newbuilding", name="new_building")
     */
    public function newBuildingList(){
        $propertyRepository = $this->em->getRepository(Property::class);
        $companyRepository = $this->em->getRepository(Company::class);
        $propertyParamsRepository = $this->em->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['newFlat' => true]);
        $propertyObjectList = $propertyRepository->findBy(['propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
        ]);
    }

    /**
     * @Route("/vse-obiecti/{category}", name="category_name_items")
     */
    public function categoryNameList(string $category){
        $propertyRepository = $this->em->getRepository(Property::class);
        $categoryRepository = $this->em->getRepository(Category::class);
        $companyRepository = $this->em->getRepository(Company::class);

        $categoryObject = $categoryRepository->findBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['category' => $categoryObject], ['createdAt' => 'DESC']);
        $companyObject = $companyRepository->find(self::COMPANY_ID);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $companyObject
        ]);
    }
}