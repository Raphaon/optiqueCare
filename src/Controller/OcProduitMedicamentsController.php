<?php

namespace App\Controller;

use App\Entity\OcProduitMedicaments;
use App\Form\OcProduitMedicamentsType;
use App\Repository\OcProduitMedicamentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medicaments")
 */
class OcProduitMedicamentsController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_produit_medicaments_index", methods={"GET"})
     */
    public function index(OcProduitMedicamentsRepository $ocProduitMedicamentsRepository): Response
    {
        return $this->render('oc_produit_medicaments/index.html.twig', [
            'oc_produit_medicaments' => $ocProduitMedicamentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_produit_medicaments_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcProduitMedicamentsRepository $ocProduitMedicamentsRepository): Response
    {
        $ocProduitMedicament = new OcProduitMedicaments();
        $form = $this->createForm(OcProduitMedicamentsType::class, $ocProduitMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitMedicamentsRepository->add($ocProduitMedicament, true);

            return $this->redirectToRoute('app_oc_produit_medicaments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produit_medicaments/new.html.twig', [
            'oc_produit_medicament' => $ocProduitMedicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produit_medicaments_show", methods={"GET"})
     */
    public function show(OcProduitMedicaments $ocProduitMedicament): Response
    {
        return $this->render('oc_produit_medicaments/show.html.twig', [
            'oc_produit_medicament' => $ocProduitMedicament,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_produit_medicaments_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcProduitMedicaments $ocProduitMedicament, OcProduitMedicamentsRepository $ocProduitMedicamentsRepository): Response
    {
        $form = $this->createForm(OcProduitMedicamentsType::class, $ocProduitMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocProduitMedicamentsRepository->add($ocProduitMedicament, true);

            return $this->redirectToRoute('app_oc_produit_medicaments_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_produit_medicaments/edit.html.twig', [
            'oc_produit_medicament' => $ocProduitMedicament,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_produit_medicaments_delete", methods={"POST"})
     */
    public function delete(Request $request, OcProduitMedicaments $ocProduitMedicament, OcProduitMedicamentsRepository $ocProduitMedicamentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocProduitMedicament->getId(), $request->request->get('_token'))) {
            $ocProduitMedicamentsRepository->remove($ocProduitMedicament, true);
        }

        return $this->redirectToRoute('app_oc_produit_medicaments_index', [], Response::HTTP_SEE_OTHER);
    }
}
