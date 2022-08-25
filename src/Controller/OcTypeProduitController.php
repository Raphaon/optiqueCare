<?php

namespace App\Controller;

use App\Entity\OcTypeProduit;
use App\Form\OcTypeProduitType;
use App\Repository\OcTypeProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits/types")
 */
class OcTypeProduitController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_type_produit_index", methods={"GET"})
     */
    public function index(OcTypeProduitRepository $ocTypeProduitRepository): Response
    {
        return $this->render('oc_type_produit/index.html.twig', [
            'oc_type_produits' => $ocTypeProduitRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_type_produit_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcTypeProduitRepository $ocTypeProduitRepository): Response
    {
        $ocTypeProduit = new OcTypeProduit();
        $form = $this->createForm(OcTypeProduitType::class, $ocTypeProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocTypeProduitRepository->add($ocTypeProduit, true);

            return $this->redirectToRoute('app_oc_type_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_type_produit/new.html.twig', [
            'oc_type_produit' => $ocTypeProduit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_type_produit_show", methods={"GET"})
     */
    public function show(OcTypeProduit $ocTypeProduit): Response
    {
        return $this->render('oc_type_produit/show.html.twig', [
            'oc_type_produit' => $ocTypeProduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_type_produit_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcTypeProduit $ocTypeProduit, OcTypeProduitRepository $ocTypeProduitRepository): Response
    {
        $form = $this->createForm(OcTypeProduitType::class, $ocTypeProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocTypeProduitRepository->add($ocTypeProduit, true);

            return $this->redirectToRoute('app_oc_type_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_type_produit/edit.html.twig', [
            'oc_type_produit' => $ocTypeProduit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_type_produit_delete", methods={"POST"})
     */
    public function delete(Request $request, OcTypeProduit $ocTypeProduit, OcTypeProduitRepository $ocTypeProduitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocTypeProduit->getId(), $request->request->get('_token'))) {
            $ocTypeProduitRepository->remove($ocTypeProduit, true);
        }

        return $this->redirectToRoute('app_oc_type_produit_index', [], Response::HTTP_SEE_OTHER);
    }
}
