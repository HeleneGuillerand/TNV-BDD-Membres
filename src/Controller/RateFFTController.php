<?php

namespace App\Controller;

use App\Entity\RateFFT;
use App\Form\RateFFTType;
use App\Repository\RateFFTRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rate/f/f/t")
 */
class RateFFTController extends AbstractController
{
    /**
     * @Route("/", name="app_rate_fft_index", methods={"GET"})
     */
    public function index(RateFFTRepository $rateFFTRepository): Response
    {
        return $this->render('rate_fft/index.html.twig', [
            'rates_fft' => $rateFFTRepository->findAllCodeAsc(),
        ]);
    }

    /**
     * @Route("/new", name="app_rate_fft_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RateFFTRepository $rateFFTRepository): Response
    {
        $rateFFT = new RateFFT();
        $form = $this->createForm(RateFFTType::class, $rateFFT);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rateFFTRepository->add($rateFFT, true);

            return $this->redirectToRoute('app_rate_fft_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate_fft/new.html.twig', [
            'rate_fft' => $rateFFT,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rate_fft_show", methods={"GET"})
     */
    public function show(RateFFT $rateFFT): Response
    {
        return $this->render('rate_fft/show.html.twig', [
            'rate_fft' => $rateFFT,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_rate_fft_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RateFFT $rateFFT, RateFFTRepository $rateFFTRepository): Response
    {
        $form = $this->createForm(RateFFTType::class, $rateFFT);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rateFFTRepository->add($rateFFT, true);

            return $this->redirectToRoute('app_rate_f_f_t_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rate_fft/edit.html.twig', [
            'rate_fft' => $rateFFT,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_rate_fft_delete", methods={"POST"})
     */
    public function delete(Request $request, RateFFT $rateFFT, RateFFTRepository $rateFFTRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rateFFT->getId(), $request->request->get('_token'))) {
            $rateFFTRepository->remove($rateFFT, true);
        }

        return $this->redirectToRoute('app_rate_fft_index', [], Response::HTTP_SEE_OTHER);
    }
}
