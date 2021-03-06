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

        $this->upItemFromType($menu);

        $menu->addChild('Новостройки', ['route' => 'new_building']);
        $menu->addChild('Ипотека', ['uri' => 'http://old.pravoned.ru/uslugi/ipoteka.html']);

        return $menu;
    }

    public function createTopMenu(){
        $menu = $this->factory->createItem('top');
        $menu->addChild('Главная', ['route' => 'homepage']);
        $menu->addChild('Услуги', ['uri' => 'http://old.pravoned.ru/uslugi.html']);
        $menu->addChild('Агенты', ['uri' => '#']);
        $menu->addChild('Партнёры', ['uri' => 'http://old.pravoned.ru/partnjory.html']);
        $menu->addChild('Отзывы', ['uri' => 'http://old.pravoned.ru/otzyvy.html']);
        $menu->addChild('Новости', ['route' => 'all_news']);
        $menu->addChild('Контакты', ['uri' => 'http://old.pravoned.ru/kontakty.html']);

        return $menu;
    }

    public function upItemFromType($menu){
        $typeRepository = $this->em->getRepository(Type::class);
        $types = $typeRepository->findAll();

        foreach ($types as $type){
            $typeName = mb_convert_case($type->getTypeName(), MB_CASE_TITLE, "UTF-8");
            $upMenuItem = $menu->addChild($typeName);
            $this->childItemFromCategory($upMenuItem, $type->getAlias());
        }
    }

    public function childItemFromCategory($upMenuItem, $typeAlias)
    {
        $categoryRepository = $this->em->getRepository(Category::class);
        $categories = $categoryRepository->findAll();
        foreach($categories as $category){
            $categoryName = mb_convert_case($category->getCategoryName(), MB_CASE_TITLE, "UTF-8");
            $upMenuItem->addChild($categoryName, [
               'route' => 'category_items',
                'routeParameters' => [
                    'alias' => $typeAlias,
                    'category' => $category->getAlias()
                ]
            ]);
        }
    }
}