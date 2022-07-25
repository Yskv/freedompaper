<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ItemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/item')]
class UserController extends AbstractController
{
    #[Route('/inscription', name: 'app_create_user', methods: ['GET'])]
    public function index(ItemRepository $itemRepository): Response
    {
        $user = new User();
        $form = $this->createFormBuilder($user);

        return $this->render('user/index.html.twig', [
            'form' => $form->getForm(),
        ]);
    }
}
