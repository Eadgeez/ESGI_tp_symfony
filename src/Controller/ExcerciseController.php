<?php

namespace App\Controller;

use App\Entity\Excercise;
use App\Form\ExcerciseType;
use App\Repository\ExcerciseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/excercise')]
final class ExcerciseController extends AbstractController
{
    #[Route(name: 'app_excercise_index', methods: ['GET'])]
    public function index(ExcerciseRepository $excerciseRepository): Response
    {
        return $this->render('excercise/index.html.twig', [
            'excercises' => $excerciseRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/new', name: 'app_excercise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $excercise = new Excercise();
        $form = $this->createForm(ExcerciseType::class, $excercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($excercise);
            $entityManager->flush();

            return $this->redirectToRoute('app_excercise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('excercise/new.html.twig', [
            'excercise' => $excercise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_excercise_show', methods: ['GET'])]
    public function show(Excercise $excercise): Response
    {
        return $this->render('excercise/show.html.twig', [
            'excercise' => $excercise,
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/{id}/edit', name: 'app_excercise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Excercise $excercise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExcerciseType::class, $excercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_excercise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('excercise/edit.html.twig', [
            'excercise' => $excercise,
            'form' => $form,
        ]);
    }

    #[IsGranted('ROLE_TEACHER')]
    #[Route('/{id}', name: 'app_excercise_delete', methods: ['POST'])]
    public function delete(Request $request, Excercise $excercise, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$excercise->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($excercise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_excercise_index', [], Response::HTTP_SEE_OTHER);
    }
}
