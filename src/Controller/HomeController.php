<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\OpeningTime;
use App\Entity\Vehicle;
use App\Entity\Commentary;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VehicleRepository;
use App\Repository\OpeningTimeRepository;
use App\Repository\CommentaryRepository;
use App\Repository\ServiceRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $ServiceRepository, OpeningTimeRepository $openingTimeRepository,VehicleRepository $vehicleRepository,CommentaryRepository $CommentaryRepository): Response
    {

        $openingTimes = $openingTimeRepository->findAll();
        $vehicles = $vehicleRepository->lastTree();
        $commentaries = $CommentaryRepository->lastFive();
        $services = $ServiceRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingTimes' => $openingTimes,
            'vehicles' => $vehicles,
            'commentaries' => $commentaries,
            'services' => $services,
        ]);
    }
}
