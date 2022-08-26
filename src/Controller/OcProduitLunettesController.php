<?php

namespace App\Controller;

use App\Entity\OcProduitLunettes;
use App\Form\OcProduitLunettesType;
use App\Repository\OcProduitLunettesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits/lunettes")
 */
class OcProduitLunettesController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_produit_lunettes_index", methods={"GET"})
     */
    public function index(OcProduitLunettesRepository $ocProduitLunettesRepository): Response
    {
        return $this->render('oc_produit_lunettes/index.html.twig', [
            'oc_produit_lunettes' => $ocProduitLunettesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_produit_lunettes_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcProduitLunettesRepository $ocProduitLunettesRepository): Response
    {
        $ocProduitLunette = new OcProduitLunettes();
        $form = $this->createForm(OcProduitLunettesType::class, $ocProduitLunette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitLunettesRepository->add($ocProduitLunette, true);

            return $this->redirectToRoute('app_oc_produit_lunettes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produit_lunettes/new.html.twig', [
            'oc_produit_lunette' => $ocProduitLunette,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produit_lunettes_show", methods={"GET"})
     */
    public function show(OcProduitLunettes $ocProduitLunette): Response
    {
        return $this->render('oc_produit_lunettes/show.html.twig', [
            'oc_produit_lunette' => $ocProduitLunette,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_produit_lunettes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcProduitLunettes $ocProduitLunette, OcProduitLunettesRepository $ocProduitLunettesRepository): Response
    {
        $form = $this->createForm(OcProduitLunettesType::class, $ocProduitLunette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitLunettesRepository->add($ocProduitLunette, true);

            return $this->redirectToRoute('app_oc_produit_lunettes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produit_lunettes/edit.html.twig', [
            'oc_produit_lunette' => $ocProduitLunette,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produit_lunettes_delete", methods={"POST"})
     */
    public function delete(Request $request, OcProduitLunettes $ocProduitLunette, OcProduitLunettesRepository $ocProduitLunettesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocProduitLunette->getId(), $request->request->get('_token'))) {
            $ocProduitLunettesRepository->remove($ocProduitLunette, true);
        }

        return $this->redirectToRoute('app_oc_produit_lunettes_index', [], Response::HTTP_SEE_OTHER);
    }
}
