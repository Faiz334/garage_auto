<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleController extends AbstractController
{
    #[Route('/voitures', name: 'app_vehicle')]
    public function index(): Response
    {
        return $this->render('vehicle/index.html.twig', [
            'controller_name' => 'VehicleController',
        ]);
    }
}
