<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\OpeningTime;
use App\Entity\Vehicle;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VehicleRepository;
use App\Repository\OpeningTimeRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OpeningTimeRepository $openingTimeRepository,VehicleRepository $vehicleRepository,): Response
    {

        $openingTimes = $openingTimeRepository->findAll();
        $vehicles = $vehicleRepository->lastTree();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingTimes' => $openingTimes,
        ]);
    }
}
