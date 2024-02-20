<?php

namespace App\Controller;

use App\Entity\Commentary;
use App\Form\CommentaryFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OpeningTimeRepository;
use App\Repository\CommentaryRepository;
use App\Entity\OpeningTime;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;

class CommentaryController extends AbstractController
{
    #[Route('/commentary', name: 'app_commentary')]
    public function index(Request $request, PersistenceManagerRegistry $doctrine, OpeningTimeRepository $openingTimeRepository, EntityManagerInterface $entityManager,CommentaryRepository $CommentaryRepository): Response
{
    $commentary = new Commentary();
    $commentaryForm = $this->createForm(CommentaryFormType::class, $commentary);
    $commentaryForm->handleRequest($request);
    $openingTimes = $openingTimeRepository->findAll();
    $commentaries = $CommentaryRepository->lastFive();

    if ($commentaryForm->isSubmitted() && $commentaryForm->isValid()) {
        $commentary->setCreatedAt(new \DateTimeImmutable());
        $em = $doctrine->getManager();
        $em->persist($commentary);
        $em->flush();
        return $this->redirectToRoute('app_home');
    }

    return $this->render('comment/commentaire.html.twig', [
        'commentary_form' => $commentaryForm->createView(), // Assurez-vous que la variable 'commentary_form' est passée au template
        'openingTimes' => $openingTimes,
        'commentaries' => $commentaries,
    ]);
}

}
