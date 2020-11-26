<?php

namespace App\Controller\Admin;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Новость')
            ->setEntityLabelInPlural('Новости')
            ->setSearchFields(['id', 'name', 'previewText', 'text', 'image']);
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name');
        $previewText = TextareaField::new('previewText');
        $text = TextareaField::new('text');
        $image = TextField::new('image');
        $imageFile = ImageField::new('imageFile')->setFormType(VichImageType::class);
        $createdAt = DateTimeField::new('createdAt');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $name, $image, $createdAt];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $previewText, $text, $image, $createdAt];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $previewText, $text, $imageFile];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $previewText, $text, $imageFile];
        }
    }
}
