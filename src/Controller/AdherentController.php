<?php

namespace App\Controller;

use App\Entity\Adherent;
use App\Form\AdherentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/adherent')]
class AdherentController extends AbstractController
{
    #[Route('/', name: 'app_adherent_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $adherents = $entityManager
            ->getRepository(Adherent::class)
            ->findAll();

        return $this->render('adherent/index.html.twig', [
            'adherents' => $adherents,
        ]);
    }

    #[Route('/new', name: 'app_adherent_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $adherent = new Adherent();
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($adherent);
            $entityManager->flush();

            return $this->redirectToRoute('app_adherent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adherent/new.html.twig', [
            'adherent' => $adherent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adherent_show', methods: ['GET'])]
    public function show(Adherent $adherent): Response
    {
        return $this->render('adherent/show.html.twig', [
            'adherent' => $adherent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_adherent_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdherentType::class, $adherent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_adherent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('adherent/edit.html.twig', [
            'adherent' => $adherent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_adherent_delete', methods: ['POST'])]
    public function delete(Request $request, Adherent $adherent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adherent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adherent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_adherent_index', [], Response::HTTP_SEE_OTHER);
    }
}
