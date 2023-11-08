<?php

namespace App\Controller\Admin;

use App\Entity\Cloth;
use App\Entity\Home;
use App\Entity\User;
use App\Entity\UserHome;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(HomeCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ma Garde Robe');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Home', 'fa fa-home', Home::class);
        yield MenuItem::linkToCrud('cloth', 'fa fa-shirt', Cloth::class);
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('UserHome', 'fa fa-users', UserHome::class);
        yield MenuItem::linkToLogout('Logout', 'fa fa-power-off');
    }
}
