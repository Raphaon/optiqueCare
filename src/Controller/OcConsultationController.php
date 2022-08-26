<?php

namespace App\Controller;

use App\Entity\OcConsultation;
use App\Form\OcConsultationType;
use App\Repository\OcConsultationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/consultations")
 */
class OcConsultationController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_consultation_index", methods={"GET"})
     */
    public function index(OcConsultationRepository $ocConsultationRepository): Response
    {
        return $this->render('oc_consultation/index.html.twig', [
            'oc_consultations' => $ocConsultationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_consultation_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcConsultationRepository $ocConsultationRepository): Response
    {
        $ocConsultation = new OcConsultation();
        $form = $this->createForm(OcConsultationType::class, $ocConsultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocConsultationRepository->add($ocConsultation, true);

            return $this->redirectToRoute('app_oc_consultation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_consultation/new.html.twig', [
            'oc_consultation' => $ocConsultation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_consultation_show", methods={"GET"})
     */
    public function show(OcConsultation $ocConsultation): Response
    {
        return $this->render('oc_consultation/show.html.twig', [
            'oc_consultation' => $ocConsultation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_consultation_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcConsultation $ocConsultation, OcConsultationRepository $ocConsultationRepository): Response
    {
        $form = $this->createForm(OcConsultationType::class, $ocConsultation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocConsultationRepository->add($ocConsultation, true);

            return $this->redirectToRoute('app_oc_consultation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_consultation/edit.html.twig', [
            'oc_consultation' => $ocConsultation,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_consultation_delete", methods={"POST"})
     */
    public function delete(Request $request, OcConsultation $ocConsultation, OcConsultationRepository $ocConsultationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocConsultation->getId(), $request->request->get('_token'))) {
            $ocConsultationRepository->remove($ocConsultation, true);
        }

        return $this->redirectToRoute('app_oc_consultation_index', [], Response::HTTP_SEE_OTHER);
    }
}
