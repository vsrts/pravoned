<?php

declare(strict_types=1);


namespace App\Realty\Form;


use App\Entity\Realty\Category;
use App\Entity\Realty\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PropertySearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class,
                [
                    'class' => Type::class,
                    'choice_label' => 'typeName',
                    'expanded' => true,
                    ])
            ->add('category', EntityType::class,
                [
                    'class' => Category::class,
                    'choice_label' => 'categoryName',
                ])
            //комнаты
                //цена
            ->add('send', SubmitType::class)
        ;
    }
}