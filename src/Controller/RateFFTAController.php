<?php

namespace App\Controller;

use App\Entity\RateFFTA;
use App\Form\RateFFTAType;
use App\Repository\RateFFTARepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rate-ffta")
 */
class RateFFTAController extends AbstractController
{
    /**
     * @Route("/", name="app_rate_ffta_index", methods={"GET"})
     */
    public function index(RateFFTARepository $rateFFTARepository): Response
    {
        return $this->render('rate_ffta/index.html.twig', [
            'rates_ffta' => $rateFFTARepository->findAllCodeAsc(),
        ]);
    }

    /**
     * @Route("/new", name="app_rate_ffta_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RateFFTARepository $rateFFTARepository): Response
    {
        $rateFFTA = new RateFFTA();
        $form = $this->createForm(RateFFTAType::class, $rateFFTA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rateFFTARepository->add($rateFFTA, true);

            return $this->redirectToRoute('app_rate_ffta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate_ffta/new.html.twig', [
            'rate_ffta' => $rateFFTA,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rate_ffta_show", methods={"GET"})
     */
    public function show(RateFFTA $rateFFTA): Response
    {
        return $this->render('rate_ffta/show.html.twig', [
            'rate_ffta' => $rateFFTA,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_rate_ffta_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RateFFTA $rateFFTA, RateFFTARepository $rateFFTARepository): Response
    {
        $form = $this->createForm(RateFFTAType::class, $rateFFTA);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rateFFTARepository->add($rateFFTA, true);

            return $this->redirectToRoute('app_rate_ffta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate_ffta/edit.html.twig', [
            'rate_ffta' => $rateFFTA,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rate_ffta_delete", methods={"POST"})
     */
    public function delete(Request $request, RateFFTA $rateFFTA, RateFFTARepository $rateFFTARepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rateFFTA->getId(), $request->request->get('_token'))) {
            $rateFFTARepository->remove($rateFFTA, true);
        }

        return $this->redirectToRoute('app_rate_ffta_index', [], Response::HTTP_SEE_OTHER);
    }
}
