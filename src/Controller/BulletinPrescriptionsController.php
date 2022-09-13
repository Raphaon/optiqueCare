<?php

namespace App\Controller;

use App\Entity\BulletinPrescriptions;
use App\Form\BulletinPrescriptionsType;
use App\Repository\BulletinPrescriptionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bulletin/prescriptions")
 */
class BulletinPrescriptionsController extends AbstractController
{
    /**
     * @Route("/", name="app_bulletin_prescriptions_index", methods={"GET"})
     */
    public function index(BulletinPrescriptionsRepository $bulletinPrescriptionsRepository): Response
    {
        return $this->render('bulletin_prescriptions/index.html.twig', [
            'bulletin_prescriptions' => $bulletinPrescriptionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bulletin_prescriptions_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BulletinPrescriptionsRepository $bulletinPrescriptionsRepository): Response
    {
        $bulletinPrescription = new BulletinPrescriptions();
        $form = $this->createForm(BulletinPrescriptionsType::class, $bulletinPrescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bulletinPrescriptionsRepository->add($bulletinPrescription, true);

            return $this->redirectToRoute('app_bulletin_prescriptions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulletin_prescriptions/new.html.twig', [
            'bulletin_prescription' => $bulletinPrescription,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bulletin_prescriptions_show", methods={"GET"})
     */
    public function show(BulletinPrescriptions $bulletinPrescription): Response
    {
        return $this->render('bulletin_prescriptions/show.html.twig', [
            'bulletin_prescription' => $bulletinPrescription,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bulletin_prescriptions_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BulletinPrescriptions $bulletinPrescription, BulletinPrescriptionsRepository $bulletinPrescriptionsRepository): Response
    {
        $form = $this->createForm(BulletinPrescriptionsType::class, $bulletinPrescription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bulletinPrescriptionsRepository->add($bulletinPrescription, true);

            return $this->redirectToRoute('app_bulletin_prescriptions_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulletin_prescriptions/edit.html.twig', [
            'bulletin_prescription' => $bulletinPrescription,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bulletin_prescriptions_delete", methods={"POST"})
     */
    public function delete(Request $request, BulletinPrescriptions $bulletinPrescription, BulletinPrescriptionsRepository $bulletinPrescriptionsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bulletinPrescription->getId(), $request->request->get('_token'))) {
            $bulletinPrescriptionsRepository->remove($bulletinPrescription, true);
        }

        return $this->redirectToRoute('app_bulletin_prescriptions_index', [], Response::HTTP_SEE_OTHER);
    }
}
