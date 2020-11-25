<?php

namespace App\Controller\Admin;

use App\Entity\Realty\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Category')
            ->setEntityLabelInPlural('Category')
            ->setSearchFields(['id', 'categoryName', 'alias']);
    }

    public function configureFields(string $pageName): iterable
    {
        $categoryName = TextField::new('categoryName');
        $alias = TextField::new('alias');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $categoryName, $alias];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $categoryName, $alias];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$categoryName, $alias];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$categoryName, $alias];
        }
    }
}
