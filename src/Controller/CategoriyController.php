<?php

namespace App\Controller;

use App\Entity\Categoriy;
use App\Form\CategoriyType;
use App\Repository\CategoriyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categoriy')]
class CategoriyController extends AbstractController
{
    #[Route('/', name: 'app_categoriy_index', methods: ['GET'])]
    public function index(CategoriyRepository $categoriyRepository): Response
    {
        return $this->render('categoriy/index.html.twig', [
            'categoriys' => $categoriyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categoriy_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategoriyRepository $categoriyRepository): Response
    {
        $categoriy = new Categoriy();
        $form = $this->createForm(CategoriyType::class, $categoriy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoriyRepository->add($categoriy, true);

            return $this->redirectToRoute('app_categoriy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categoriy/new.html.twig', [
            'categoriy' => $categoriy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categoriy_show', methods: ['GET'])]
    public function show(Categoriy $categoriy): Response
    {
        return $this->render('categoriy/show.html.twig', [
            'categoriy' => $categoriy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categoriy_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Categoriy $categoriy, CategoriyRepository $categoriyRepository): Response
    {
        $form = $this->createForm(CategoriyType::class, $categoriy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoriyRepository->add($categoriy, true);

            return $this->redirectToRoute('app_categoriy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categoriy/edit.html.twig', [
            'categoriy' => $categoriy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categoriy_delete', methods: ['POST'])]
    public function delete(Request $request, Categoriy $categoriy, CategoriyRepository $categoriyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoriy->getId(), $request->request->get('_token'))) {
            $categoriyRepository->remove($categoriy, true);
        }

        return $this->redirectToRoute('app_categoriy_index', [], Response::HTTP_SEE_OTHER);
    }
}
