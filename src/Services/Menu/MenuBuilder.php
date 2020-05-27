<?php

declare(strict_types=1);


namespace App\Services\Menu;

use App\Entity\Realty\Category;
use App\Entity\Realty\Type;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    private $factory;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @param FactoryInterface $factory
     *
     * Add any other dependency you need
     */
    public function __construct(FactoryInterface $factory, EntityManagerInterface $em)
    {
        $this->factory = $factory;
        $this->em = $em;
    }

    public function createMainMenu()
    {
        $menu = $this->factory->createItem('root');
        $menu->addChild('Home', [
            'uri' => '/'
        ]);

        $this->upItemFromType($menu);

        return $menu;
    }

    public function upItemFromType($menu){
        $typeRepository = $this->em->getRepository(Type::class);
        $types = $typeRepository->findAll();

        foreach ($types as $type){
            $upMenuItem = $menu->addChild($type->getTypeName());
            $this->childItemFromCategory($upMenuItem, $type->getAlias());
        }
    }

    public function childItemFromCategory($upMenuItem, $typeAlias)
    {
        $categoryRepository = $this->em->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        foreach($categories as $category){
            $upMenuItem->addChild($category->getCategoryName(), [
               'route' => 'category_items',
                'routeParameters' => [
                    'type' => $typeAlias,
                    'alias' => $category->getAlias()
                ]
            ]);
        }
    }
}