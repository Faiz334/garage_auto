<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OpeningTime;
use App\Repository\OpeningTimeRepository;
use App\Entity\Vehicle;
use App\Repository\VehicleRepository;

class VehicleController extends AbstractController
{
    #[Route('/voitures', name: 'app_vehicle')]
    public function index(VehicleRepository $vehicleRepository,OpeningTimeRepository $openingTimeRepository): Response
    {
        $openingTimes = $openingTimeRepository->findAll();
        $vehicles = $vehicleRepository->findAll();

        return $this->render('vehicles/all.html.twig', [
            'controller_name' => 'VehicleController',
            'vehicles' => $vehicles,
            'openingTimes' => $openingTimes,
        ]);
    }
}
