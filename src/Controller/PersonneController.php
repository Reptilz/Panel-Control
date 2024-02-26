<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/personne')]
class PersonneController extends AbstractController
{

    #[Route('/', name: 'personne.list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->findAll();
        return $this->render('personne/index.html.twig', ['personnes' => $personnes]);
    }



    #[Route('/{id<\d+>}', name: 'personne.detail')]
    public function detail(ManagerRegistry $doctrine, $id): Response
    {
        $repository = $doctrine->getRepository(Personne::class);
        $personne = $repository->find($id);

        if (!$personne) {
            $this->addFlash('error', "La personne avec l'id $id n'existe pas");
            return $this->redirectToRoute('personne.list');
        }

        return $this->render('personne/detail.html.twig', ['personne' => $personne]);
    }



    #[Route('/add', name: 'personne.add')]
    public function addPersonne(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $personne = new Personne();
        $personne->setFirstname('Jordan');
        $personne->setName('Morlet');
        $personne->setAge('29');

        // $personne2 = new Personne();
        // $personne2->setFirstname('Flavio');
        // $personne2->setName('Gibilaro');
        // $personne2->setAge('20');


        $entityManager->persist($personne);
        $entityManager->persist($personne2);

        $entityManager->flush();
        return $this->render('personne/detail.html.twig', [
            'personne' => $personne,
        ]);
    }
}
