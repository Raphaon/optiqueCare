<?php

namespace App\Controller;

use App\Entity\OcPatients;
use App\Form\OcPatientsType;
use App\Repository\OcPatientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/patients")
 */
class OcPatientsController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_patients_index", methods={"GET"})
     */
    public function index(OcPatientsRepository $ocPatientsRepository): Response
    {
        return $this->render('oc_patients/index.html.twig', [
            'oc_patients' => $ocPatientsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_patients_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcPatientsRepository $ocPatientsRepository): Response
    {
        $ocPatient = new OcPatients();
        $form = $this->createForm(OcPatientsType::class, $ocPatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPatientsRepository->add($ocPatient, true);

            return $this->redirectToRoute('app_oc_patients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_patients/new.html.twig', [
            'oc_patient' => $ocPatient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_patients_show", methods={"GET"})
     */
    public function show(OcPatients $ocPatient): Response
    {
        return $this->render('oc_patients/show.html.twig', [
            'oc_patient' => $ocPatient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_patients_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcPatients $ocPatient, OcPatientsRepository $ocPatientsRepository): Response
    {
        $form = $this->createForm(OcPatientsType::class, $ocPatient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocPatientsRepository->add($ocPatient, true);

            return $this->redirectToRoute('app_oc_patients_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_patients/edit.html.twig', [
            'oc_patient' => $ocPatient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_patients_delete", methods={"POST"})
     */
    public function delete(Request $request, OcPatients $ocPatient, OcPatientsRepository $ocPatientsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocPatient->getId(), $request->request->get('_token'))) {
            $ocPatientsRepository->remove($ocPatient, true);
        }

        return $this->redirectToRoute('app_oc_patients_index', [], Response::HTTP_SEE_OTHER);
    }
}
