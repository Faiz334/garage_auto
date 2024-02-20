<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactFormType;
use App\Repository\OpeningTimeRepository;
use App\Entity\OpeningTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index( PersistenceManagerRegistry $doctrine, EntityManagerInterface $entityManager, OpeningTimeRepository $openingTimeRepository,Request $request): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);
        $openingTimes = $openingTimeRepository->findAll();

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $doctrine->getManager();
            $em->persist($contact);
            $em->flush();
            
            $this->addFlash('success', 'Votre Message a bien été envoyée !');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'openingTimes' => $openingTimes,
            'form' => $form->createView(),
        ]);
    }
}
