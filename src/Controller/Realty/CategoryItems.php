<?php

declare(strict_types=1);


namespace App\Controller\Realty;


use App\Controller\BaseController;
use App\Entity\Realty\Category;
use App\Entity\Realty\Property;
use App\Entity\Realty\PropertyParams;
use App\Entity\Realty\Type;
use Symfony\Component\Routing\Annotation\Route;

class CategoryItems extends BaseController
{

    /**
     * @Route("/{alias}/{category}", name="category_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryItemsList(Type $type, string $category){
        $propertyRepository = $this->getRepository(Property::class);
        $categoryRepository = $this->getRepository(Category::class);

        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject], ['createdAt' => 'DESC']);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $this->getCompanyData()
            ]);
    }

    /**
     * @Route("/{alias}/{category}/{num}-room", name="category_param_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryParamItemsList(Type $type, string $category, int $num){
        $propertyRepository = $this->getRepository(Property::class);
        $categoryRepository = $this->getRepository(Category::class);
        $propertyParamsRepository = $this->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['rooms' => $num]);
        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject, 'propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $this->getCompanyData()
        ]);
    }

    /**
     * @Route("/{alias}/{category}/studio", name="category_studio_items", requirements={"alias"="prodazha|arenda"})
     */
    public function categoryStudioItemsList(Type $type, string $category){
        $propertyRepository = $this->getRepository(Property::class);
        $categoryRepository = $this->getRepository(Category::class);
        $propertyParamsRepository = $this->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['studio' => true]);
        $categoryObject = $categoryRepository->findOneBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['type' => $type, 'category' => $categoryObject, 'propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $this->getCompanyData()
        ]);
    }

    /**
     * @Route("/newbuilding", name="new_building")
     */
    public function newBuildingList(){
        $propertyRepository = $this->getRepository(Property::class);
        $propertyParamsRepository = $this->getRepository(PropertyParams::class);

        $propertyParamsObjects = $propertyParamsRepository->findBy(['newFlat' => true]);
        $propertyObjectList = $propertyRepository->findBy(['propertyParams' => $propertyParamsObjects], ['createdAt' => 'DESC']);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $this->getCompanyData()
        ]);
    }

    /**
     * @Route("/vse-obiecti/{category}", name="category_name_items")
     */
    public function categoryNameList(string $category){
        $propertyRepository = $this->getRepository(Property::class);
        $categoryRepository = $this->getRepository(Category::class);

        $categoryObject = $categoryRepository->findBy(['alias' => $category]);
        $propertyObjectList = $propertyRepository->findBy(['category' => $categoryObject], ['createdAt' => 'DESC']);

        return $this->render('realty/category_items_list.html.twig', [
            'properties' => $propertyObjectList,
            'company' => $this->getCompanyData()
        ]);
    }
}