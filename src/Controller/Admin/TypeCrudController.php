<?php

namespace App\Controller\Admin;

use App\Entity\Realty\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Type::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Type')
            ->setEntityLabelInPlural('Type')
            ->setSearchFields(['id', 'typeName', 'alias']);
    }

    public function configureFields(string $pageName): iterable
    {
        $typeName = TextField::new('typeName');
        $alias = TextField::new('alias');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $typeName, $alias];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $typeName, $alias];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$typeName, $alias];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$typeName, $alias];
        }
    }
}
