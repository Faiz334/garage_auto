<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OpeningTime;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Entity\Engine;
use App\Entity\Brand;
use App\Entity\Gearbox;
use App\Entity\Commentary;
use App\Entity\Service;
use App\Entity\Contact;



class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
      
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(VehicleCrudController::class)->generateUrl());
    
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage Auto');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Aller sur le site', 'fa fa-undo', 'app_home');
        
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::linkToCrud('Voitures', 'fas fa-car', Vehicle::class);

        yield MenuItem::linkToCrud('Constructeurs', 'fas fa-copyright', Brand::class);

        yield MenuItem::linkToCrud('Boite de vitesse', 'fas fa-gear', Gearbox::class);

        yield MenuItem::linkToCrud('Moteur', 'fas fa-engine', Engine::class);

        yield MenuItem::linkToCrud('Commentaire', 'fas fa-comment', Commentary::class);

        yield MenuItem::linkToCrud('Contact', 'fas fa-message', Contact::class);

        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock', OpeningTime::class);

        yield MenuItem::linkToCrud('Services', 'fas fa-clock', Service::class);

        if ($this->isGranted('ROLE_ADMIN')){

            yield MenuItem::subMenu('Utlisateur', 'fas fa-user',)->setSubItems([
                MenuItem::linkToCrud('Tout les Utlisateurs','fas fa-user', User::class),
                MenuItem::linkToCrud('Ajouter','fas fa-plus', User::class)->setAction(Crud::PAGE_NEW)
        ]);}
    }
}
