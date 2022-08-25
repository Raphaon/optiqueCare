<?php

namespace App\Controller;

use App\Entity\OcPrescripteurFonctions;
use App\Form\OcPrescripteurFonctionsType;
use App\Repository\OcPrescripteurFonctionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fonctions")
 */
class OcPrescripteurFonctionsController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_prescripteur_fonctions_index", methods={"GET"})
     */
    public function index(OcPrescripteurFonctionsRepository $ocPrescripteurFonctionsRepository): Response
    {
        return $this->render('oc_prescripteur_fonctions/index.html.twig', [
            'oc_prescripteur_fonctions' => $ocPrescripteurFonctionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_prescripteur_fonctions_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcPrescripteurFonctionsRepository $ocPrescripteurFonctionsRepository): Response
    {
        $ocPrescripteurFonction = new OcPrescripteurFonctions();
        $form = $this->createForm(OcPrescripteurFonctionsType::class, $ocPrescripteurFonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPrescripteurFonctionsRepository->add($ocPrescripteurFonction, true);

            return $this->redirectToRoute('app_oc_prescripteur_fonctions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_prescripteur_fonctions/new.html.twig', [
            'oc_prescripteur_fonction' => $ocPrescripteurFonction,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_prescripteur_fonctions_show", methods={"GET"})
     */
    public function show(OcPrescripteurFonctions $ocPrescripteurFonction): Response
    {
        return $this->render('oc_prescripteur_fonctions/show.html.twig', [
            'oc_prescripteur_fonction' => $ocPrescripteurFonction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_prescripteur_fonctions_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcPrescripteurFonctions $ocPrescripteurFonction, OcPrescripteurFonctionsRepository $ocPrescripteurFonctionsRepository): Response
    {
        $form = $this->createForm(OcPrescripteurFonctionsType::class, $ocPrescripteurFonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPrescripteurFonctionsRepository->add($ocPrescripteurFonction, true);

            return $this->redirectToRoute('app_oc_prescripteur_fonctions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_prescripteur_fonctions/edit.html.twig', [
            'oc_prescripteur_fonction' => $ocPrescripteurFonction,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_prescripteur_fonctions_delete", methods={"POST"})
     */
    public function delete(Request $request, OcPrescripteurFonctions $ocPrescripteurFonction, OcPrescripteurFonctionsRepository $ocPrescripteurFonctionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocPrescripteurFonction->getId(), $request->request->get('_token'))) {
            $ocPrescripteurFonctionsRepository->remove($ocPrescripteurFonction, true);
        }

        return $this->redirectToRoute('app_oc_prescripteur_fonctions_index', [], Response::HTTP_SEE_OTHER);
    }
}
