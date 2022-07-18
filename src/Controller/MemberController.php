<?php

namespace App\Controller;

use App\Entity\Member;
use App\Form\MemberType;
use App\Repository\MemberRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/membre")
 */
class MemberController extends AbstractController
{
    /**
     * @Route("/", name="app_member_index", methods={"GET"})
     */
    public function index(MemberRepository $memberRepository): Response
    {
        return $this->render('member/index.html.twig', [
            'members' => $memberRepository->findAll(),
        ]);
    }

    /**
     * @Route("/fft", name="app_member_fft", methods={"GET"})
     */
    public function fftMembers(MemberRepository $memberRepository): Response
    {
        return $this->render('member/fft.html.twig', [
            'members' => $memberRepository->findAllFFT(),
        ]);
    }

    /**
     * @Route("/first", name="app_member_first", methods={"GET"})
     */
    public function first(MemberRepository $memberRepository): Response
    {
        return $this->render('member/first.html.twig', [
            'members' => $memberRepository->findAllFirst(),
        ]);
    }

    /**
     * @Route("/second", name="app_member_second", methods={"GET"})
     */
    public function second(MemberRepository $memberRepository): Response
    {
        return $this->render('member/second.html.twig', [
            'members' => $memberRepository->findAllSecond(),
        ]);
    }

    /**
     * @Route("/ag", name="app_member_ag", methods={"GET"})
     */
    public function ag(MemberRepository $memberRepository): Response
    {
        return $this->render('member/ag.html.twig', [
            'members' => $memberRepository->findAllAg(),
        ]);
    }

    /**
     * @Route("/youths", name="app_member_youths", methods={"GET"})
     */
    public function youths(MemberRepository $memberRepository): Response
    {
        return $this->render('member/youths.html.twig', [
            'members' => $memberRepository->findAllYouths(),
        ]);
    }

    /**
     * @Route("/ffta", name="app_member_ffta", methods={"GET"})
     */
    public function fftaMembers(MemberRepository $memberRepository): Response
    {
        return $this->render('member/ffta.html.twig', [
            'members' => $memberRepository->findAllFFTA(),
        ]);
    }

    /**
     * @Route("/creer", name="app_member_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MemberRepository $memberRepository): Response
    {
        $member = new Member();
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $memberRepository->add($member, true);

            //flash message
            $this->addFlash('success', $member->getFirstname() .' '. $member->getLastname() .' a bien été créé(e)');

            return $this->redirectToRoute('app_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('member/new.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_member_show", methods={"GET"})
     */
    public function show(Member $member): Response
    {
        //404?
        if ($member === null) {
            throw $this->createNotFoundException('Membre non trouvé.');
        }
        
        return $this->render('member/show.html.twig', [
            'member' => $member,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_member_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        //404?
        if ($member === null) {
            throw $this->createNotFoundException('Membre non trouvé.');
        }
        
        $form = $this->createForm(MemberType::class, $member);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //we set updatedAt
            $member->setUpdatedAt(new DateTimeImmutable());
            
            $memberRepository->add($member, true);
            //flash message
            $this->addFlash('success', $member->getFirstname() .' '. $member->getLastname() .' a bien été modifié(e)');
            
            return $this->redirectToRoute('app_member_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('member/edit.html.twig', [
            'member' => $member,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_member_delete", methods={"POST"})
     */
    public function delete(Request $request, Member $member, MemberRepository $memberRepository): Response
    {
        //404?
        if ($member === null) {
            throw $this->createNotFoundException('Membre non trouvé.');
        }
        
        if ($this->isCsrfTokenValid('delete'.$member->getId(), $request->request->get('_token'))) {
            $memberRepository->remove($member, true);
            $this->addFlash('danger', 'Membre supprimé.');
        }
        //TODO check what happends with box upon member deletion
        return $this->redirectToRoute('app_member_index', [], Response::HTTP_SEE_OTHER);
    }
}
