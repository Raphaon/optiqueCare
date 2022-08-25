<?php

namespace App\Controller;

use App\Entity\OcPrescripteurs;
use App\Form\OcPrescripteursType;
use App\Repository\OcPrescripteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prescripteurs")
 */
class OcPrescripteursController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_prescripteurs_index", methods={"GET"})
     */
    public function index(OcPrescripteursRepository $ocPrescripteursRepository): Response
    {
        return $this->render('oc_prescripteurs/index.html.twig', [
            'oc_prescripteurs' => $ocPrescripteursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_prescripteurs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcPrescripteursRepository $ocPrescripteursRepository): Response
    {
        $ocPrescripteur = new OcPrescripteurs();
        $form = $this->createForm(OcPrescripteursType::class, $ocPrescripteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPrescripteursRepository->add($ocPrescripteur, true);

            return $this->redirectToRoute('app_oc_prescripteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_prescripteurs/new.html.twig', [
            'oc_prescripteur' => $ocPrescripteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_prescripteurs_show", methods={"GET"})
     */
    public function show(OcPrescripteurs $ocPrescripteur): Response
    {
        return $this->render('oc_prescripteurs/show.html.twig', [
            'oc_prescripteur' => $ocPrescripteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_prescripteurs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcPrescripteurs $ocPrescripteur, OcPrescripteursRepository $ocPrescripteursRepository): Response
    {
        $form = $this->createForm(OcPrescripteursType::class, $ocPrescripteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPrescripteursRepository->add($ocPrescripteur, true);

            return $this->redirectToRoute('app_oc_prescripteurs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_prescripteurs/edit.html.twig', [
            'oc_prescripteur' => $ocPrescripteur,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_prescripteurs_delete", methods={"POST"})
     */
    public function delete(Request $request, OcPrescripteurs $ocPrescripteur, OcPrescripteursRepository $ocPrescripteursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocPrescripteur->getId(), $request->request->get('_token'))) {
            $ocPrescripteursRepository->remove($ocPrescripteur, true);
        }

        return $this->redirectToRoute('app_oc_prescripteurs_index', [], Response::HTTP_SEE_OTHER);
    }
}
