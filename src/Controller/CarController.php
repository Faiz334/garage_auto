<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OpeningTime;
use App\Repository\OpeningTimeRepository;
use App\Entity\Vehicle;
use App\Repository\VehicleRepository;


class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'app_car')]
    public function show(Vehicle $vehicle,VehicleRepository $vehicleRepository,OpeningTimeRepository $openingTimeRepository): Response
    {
        $openingTimes = $openingTimeRepository->findAll();

        return $this->render('car/car.html.twig', [
            'controller_name' => 'CarController',
            'vehicle' => $vehicle,
            'openingTimes' => $openingTimes,
        ]);
    }
}
