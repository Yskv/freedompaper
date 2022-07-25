<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/inscription', name: 'app_create_user', methods: ['GET'])]
    public function index(): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
