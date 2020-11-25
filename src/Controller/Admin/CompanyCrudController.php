<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompanyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Company::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Company')
            ->setEntityLabelInPlural('Company')
            ->setSearchFields(['id', 'name', 'address', 'phone', 'email', 'workTime', 'info']);
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name');
        $address = TextField::new('address');
        $phone = TextField::new('phone');
        $email = TextField::new('email');
        $workTime = TextField::new('workTime');
        $info = TextareaField::new('info');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $name, $address, $phone, $email, $workTime];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $address, $phone, $email, $workTime, $info];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $address, $phone, $email, $workTime, $info];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $address, $phone, $email, $workTime, $info];
        }
    }
}
