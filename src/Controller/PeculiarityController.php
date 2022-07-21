<?php

namespace App\Controller;

use App\Entity\Peculiarity;
use App\Form\PeculiarityType;
use App\Repository\PeculiarityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/peculiarity")
 */
class PeculiarityController extends AbstractController
{
    /**
     * @Route("/", name="app_peculiarity_index", methods={"GET"})
     */
    public function index(PeculiarityRepository $peculiarityRepository): Response
    {
        return $this->render('peculiarity/index.html.twig', [
            'peculiarities' => $peculiarityRepository->findAllNameAsc(),
        ]);
    }

    /**
     * @Route("/new", name="app_peculiarity_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PeculiarityRepository $peculiarityRepository): Response
    {
        $peculiarity = new Peculiarity();
        $form = $this->createForm(PeculiarityType::class, $peculiarity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peculiarityRepository->add($peculiarity, true);

            return $this->redirectToRoute('app_peculiarity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('peculiarity/new.html.twig', [
            'peculiarity' => $peculiarity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_peculiarity_show", methods={"GET"})
     */
    public function show(Peculiarity $peculiarity): Response
    {
        return $this->render('peculiarity/show.html.twig', [
            'peculiarity' => $peculiarity,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_peculiarity_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Peculiarity $peculiarity, PeculiarityRepository $peculiarityRepository): Response
    {
        $form = $this->createForm(PeculiarityType::class, $peculiarity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peculiarityRepository->add($peculiarity, true);

            return $this->redirectToRoute('app_peculiarity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('peculiarity/edit.html.twig', [
            'peculiarity' => $peculiarity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_peculiarity_delete", methods={"POST"})
     */
    public function delete(Request $request, Peculiarity $peculiarity, PeculiarityRepository $peculiarityRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$peculiarity->getId(), $request->request->get('_token'))) {
            $peculiarityRepository->remove($peculiarity, true);
        }

        return $this->redirectToRoute('app_peculiarity_index', [], Response::HTTP_SEE_OTHER);
    }
}
