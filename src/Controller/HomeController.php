<?php

namespace App\Controller;

use App\Service\EssaiService;
use LDAP\Result;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $this->addFlash("sucess", "voici un message de réussite");
        return $this->render('home/index.html.twig', [
            'message' => "coucocu",
        ]);
    }

    #[Route(
    '/age/{age}/{taille}',
    name: 'home_age',
    defaults: [
        "age" => 0, 
        "taille" => 100,
    ],
    requirements: [
        "age" => "\d+",
        "taille" => "\d+",
    ],
    methods: [
        "GET",
    ]
    )]
    public function age(int $age, int $taille, HttpFoundationRequest $request, EssaiService $objet): Response
    {
        $result = $objet->plus(2, 3);
        dd($result);

        if ($age == 0) {
            $age = "vous avez votre age, mais on ne sait pas depuis combien d'";
        }
        return $this->render('home/age.html.twig', [
            'age' => $age,
            'taille' => $taille,
        ]);
    }
}
