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
            ->setTitle('EasyAdmin');
    }

    public function configureCrud(): Crud
    {
        return Crud::new();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Category', 'fas fa-folder-open', Category::class);
        yield MenuItem::linkToCrud('Type', 'fas fa-folder-open', Type::class);
        yield MenuItem::linkToCrud('Company', 'fas fa-folder-open', Company::class);
        yield MenuItem::linkToCrud('News', 'fas fa-folder-open', News::class);
    }
}
