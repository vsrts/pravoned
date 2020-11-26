<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\News;
use App\Entity\Realty\Category;
use App\Entity\Realty\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Панель управления сайтом');
    }

    public function configureCrud(): Crud
    {
        return Crud::new();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Категории', 'fas fa-folder-open', Category::class);
        yield MenuItem::linkToCrud('Типы', 'fas fa-folder-open', Type::class);
        yield MenuItem::linkToCrud('О компании', 'fas fa-folder-open', Company::class);
        yield MenuItem::linkToCrud('Новости', 'fas fa-folder-open', News::class);
    }
}
