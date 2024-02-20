<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\OpeningTime;
use App\Repository\OpeningTimeRepository;
use App\Entity\Vehicle;
use App\Entity\brand;
use App\Repository\VehicleRepository;
use App\Repository\EngineRepository;
use App\Repository\BrandRepository;
use App\Repository\GearboxRepository;
use Symfony\Component\HttpFoundation\JsonResponse; 

class VehicleController extends AbstractController
{
    #[Route('/voitures', name: 'app_vehicle')]
    public function index(Request $request, VehicleRepository $vehicleRepository, OpeningTimeRepository $openingTimeRepository,EngineRepository $engineRepository,BrandRepository $brandRepository,GearboxRepository $gearboxRepository ): Response
    {
        // Récupérer les paramètres de filtrage de la requête GET
        $openingTimes = $openingTimeRepository->findAll();
        $minPrice = $request->query->get('min_price');
        $maxPrice = $request->query->get('max_price');
        $order = $request->query->get('order');
        $filteredVehicles = $vehicleRepository->findByPriceRange($minPrice, $maxPrice);
        
         // Vérifier si le paramètre de tri est valide
         if ($order !== 'ASC' && $order !== 'DESC') {
            $order = 'ASC'; // Par défaut, tri croissant
        }

        $vehicles = $vehicleRepository->findAllSortedByPrice($order);

        // Le reste du code pour la réponse HTML normale
        return $this->render('vehicles/all.html.twig', [
            'vehicles' => $vehicles,
            'openingTimes' => $openingTimes,
        ]);
    }

    #[Route('/voitures/filter-vehicles', name: 'filter_vehicles')]
    public function filterVehicles(Request $request): JsonResponse
    {
        $minPrice = $request->request->get('minPrice');
        $maxPrice = $request->request->get('maxPrice');

        // Utilisez les valeurs $minPrice et $maxPrice pour filtrer les véhicules
        $filteredVehicles = $this->getDoctrine()->getRepository(Vehicle::class)->findVehiclesInRange($minPrice, $maxPrice);

        return $this->json($filteredVehicles);
    }
}
