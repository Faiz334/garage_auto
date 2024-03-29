<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Entity\OpeningTime;
use App\Repository\OpeningTimeRepository;
use App\Entity\Vehicle;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;


class CarController extends AbstractController
{
    #[Route('/car/{id}', name: 'app_car')]
    public function show(PersistenceManagerRegistry $doctrine, EntityManagerInterface $entityManager,Request $request,Vehicle $vehicle,VehicleRepository $vehicleRepository,OpeningTimeRepository $openingTimeRepository,$id ): Response
    {
        $openingTimes = $openingTimeRepository->findAll();
        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            
            $this->addFlash('success', 'Votre Message a bien été envoyée !');

        }

        return $this->render('car/car.html.twig', [
            'controller_name' => 'CarController',
            'vehicle' => $vehicle,
            'openingTimes' => $openingTimes,
            'form' => $form->createView(),
        ]);
    }
}
