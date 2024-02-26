<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/template', name: 'template')]
    public function template(): Response
    {
        return $this->render('template.html.twig');
    }


    #[Route('/order/{maVar}', name: 'test.order.route')]
    public function testOrderRoute($maVar): Response
    {
        return new Response("
        <html><body>$maVar</body></html>
        ");
    }



    #[Route('/first', name: 'first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig', [
            'name' => 'Morlet',
            'firstname' => 'Jordan',
        ]);
    }


    // #[Route('/hello/{name}/{firstname}', name: 'hello')]
    public function hello(Request $request, $name, $firstname): Response
    {
        return $this->render('first/hello.html.twig', [
            'nom' => $name,
            'prenom' => $firstname,
        ]);
    }


    #[Route(
        'multi/{entier1<\d+>}/{entier2<\d+>}',
        name: 'multiplications',
    )]
    public function multiplication($entier1, $entier2): Response
    {
        $resultat = $entier1 * $entier2;
        return new Response("<h1>$resultat</h1>");
    }
}
