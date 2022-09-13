<?php

namespace App\Controller;

use App\Entity\OcProduits;
use App\Form\OcProduitsType;
use App\Repository\OcProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits")
 */
class OcProduitsController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_produits_index", methods={"GET"})
     */
    public function index(OcProduitsRepository $ocProduitsRepository): Response
    {
        return $this->render('oc_produits/index.html.twig', [
            'oc_produits' => $ocProduitsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_produits_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcProduitsRepository $ocProduitsRepository): Response
    {
        $ocProduit = new OcProduits();
        $form = $this->createForm(OcProduitsType::class, $ocProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitsRepository->add($ocProduit, true);

            return $this->redirectToRoute('app_oc_produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produits/new.html.twig', [
            'oc_produit' => $ocProduit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produits_show", methods={"GET"})
     */
    public function show(OcProduits $ocProduit): Response
    {
        return $this->render('oc_produits/show.html.twig', [
            'oc_produit' => $ocProduit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_produits_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcProduits $ocProduit, OcProduitsRepository $ocProduitsRepository): Response
    {
        $form = $this->createForm(OcProduitsType::class, $ocProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitsRepository->add($ocProduit, true);

            return $this->redirectToRoute('app_oc_produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produits/edit.html.twig', [
            'oc_produit' => $ocProduit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produits_delete", methods={"POST"})
     */
    public function delete(Request $request, OcProduits $ocProduit, OcProduitsRepository $ocProduitsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocProduit->getId(), $request->request->get('_token'))) {
            $ocProduitsRepository->remove($ocProduit, true);
        }

        return $this->redirectToRoute('app_oc_produits_index', [], Response::HTTP_SEE_OTHER);
    }
}
