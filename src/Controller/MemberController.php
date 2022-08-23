<?php

namespace App\Controller;

use DateInterval;
use App\Entity\Member;
use DateTimeImmutable;
use App\Form\MemberType;
use App\Entity\Peculiarity;
use Doctrine\ORM\EntityManager;
use App\Repository\MemberRepository;
use App\Repository\PeculiarityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
            'members' => $memberRepository->findAllAlphabetical(),
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
     * @Route("/afft", name="app_member_actif", methods={"GET"})
     */
    public function actifFftMembers(MemberRepository $memberRepository): Response
    {
        return $this->render('member/actiffft.html.twig', [
            'members' => $memberRepository->findAllActifFFT(),
        ]);
    }

    /**
     * @Route("/first", name="app_member_first", methods={"GET"})
     */
    public function first(MemberRepository $memberRepository): Response
    {
        //We want the member registered with TNV as First club 
        $clubNb = 1;

        return $this->render('member/first.html.twig', [
            'members' => $memberRepository->findAllClub($clubNb),
        ]);
    }

    /**
     * @Route("/second", name="app_member_second", methods={"GET"})
     */
    public function second(MemberRepository $memberRepository): Response
    {
        //We want the member registered with TNV as Second club 
        $clubNb = 2;

        return $this->render('member/second.html.twig', [
            'members' => $memberRepository->findAllClub($clubNb),
        ]);
    }

    /**
     * @Route("/ag", name="app_member_ag", methods={"GET", "POST"})
     */
    public function ag(Request $request, MemberRepository $memberRepository): Response
    {

        if ($request->query->get('nextAg') != null ) {
           //we get the assembly date
            $nextAg = new DateTimeImmutable($request->query->get('nextAg'));
           
            //we set registarationLimit and birthLimit
            //where firstRegisteration must be older than NextAg - 6months
            $registerationLimit = $nextAg->sub(new DateInterval('P6M'));
            //where dateOfBirth must be older than NextAg -16 years 
            $birthLimit = $nextAg->sub(new DateInterval('P16Y'));;
            
            //we diplay the page with the members' list
            return $this->render('member/ag.html.twig', [
                'members' => $memberRepository->findAllAg($registerationLimit, $birthLimit),
                'nextAg' => $nextAg
            ]);
            
        }

        return $this->render('member/ag.html.twig', [
            'members' => null,
            'nextAg' => null
        ]);
    }

    /**
     * @Route("/attestation", name="app_member_attestation", methods={"GET"})
     */
    public function attestation(MemberRepository $memberRepository): Response
    {

        return $this->render('member/attestation.html.twig', [
            'members' => $memberRepository->findAllAttestation(),
        ]);
    }


    /**
     * @Route("/youths", name="app_member_youths", methods={"GET"})
     */
    public function youths(MemberRepository $memberRepository, PeculiarityRepository $peculiarityRepository): Response
    {
        //we identify the "Ecole de tir" peculiarity id
        $youthPeculiarity = $peculiarityRepository->findOneByName('Ecole de tir');

        return $this->render('member/youths.html.twig', [
            'members' => $memberRepository->findByPeculiarity($youthPeculiarity),
        ]);
    }

    /**
     * @Route("/initiation", name="app_member_initiation", methods={"GET"})
     */
    public function initiation(MemberRepository $memberRepository, PeculiarityRepository $peculiarityRepository): Response
    {
        //we identify the "Initiation Adulte" peculiarity id
        $initiationPeculiarity = $peculiarityRepository->findOneByName('Initiation Adulte');

        return $this->render('member/initiation.html.twig', [
            'members' => $memberRepository->findByPeculiarity($initiationPeculiarity),
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

    // /**
    // * @Route("/download/{list}", name="app_member_download")
    // */
    //public function download($memberslist): Response
    //{
    //    //we transform our objects list into a csv file
    //    $rows = array();
    //    foreach ($memberslist as $member) {
    //        $data = array(
    //            $member->getTitle(),
    //            $member->getLastname(),
    //            $member->getMaidenName(),
    //            $member->getFirstname(),
    //            $member->getDateOfBirth()->format('d/m/Y'),
    //            $member->getPlaceOfBirth(),
    //            $member->getAddress(),
    //            $member->getZipcode(),
    //            $member->getCity(),
    //            $member->getFirstEmail(),
    //            $member->getSecondEmail(),
    //            $member->getFirstPhone(),
    //            $member->getSecondPhone(),
    //            $member->getMobilePhone(),
    //            $member->getSponsor(),
    //            $member->getJob(),
    //            $member->getpouvoirAg(),
    //            $member->getDonation(),
    //            $member->getTotalPayed(),
    //            $member->getIsRegistered(),
    //            $member->getUpdatedAt()->format('d/m/Y'),
    //            $member->getFirstRegisteration()->format('d/m/Y'),
    //            $member->getFftNumber(),
    //            $member->getFftaNumber(),
    //            $member->getLastKnownSeason(),
    //            $member->getAttestation(),
    //            $member->getSecondClub(),
    //            $member->getStatus(),
    //            $member->getNote()
    //        );
    //
    //        $rows[] = implode(',', $data);
    //    }
    //
    //    $content = implode("\n", $rows);
    //    $response = new Response($content);
    //    $response->headers->set('Content-Type', 'text/csv');
//
    //    return $response;
    //    
    //}
}
