<?php

namespace App\Controller;

use App\Entity\OcExamens;
use App\Form\OcExamensType;
use App\Repository\OcExamensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/examens")
 */
class OcExamensController extends AbstractController
{
    /**
     * @Route("/", name="app_oc_examens_index", methods={"GET"})
     */
    public function index(OcExamensRepository $ocExamensRepository): Response
    {
        return $this->render('oc_examens/index.html.twig', [
            'oc_examens' => $ocExamensRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oc_examens_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OcExamensRepository $ocExamensRepository): Response
    {
        $ocExamen = new OcExamens();
        $form = $this->createForm(OcExamensType::class, $ocExamen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocExamensRepository->add($ocExamen, true);

            return $this->redirectToRoute('app_oc_examens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_examens/new.html.twig', [
            'oc_examen' => $ocExamen,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_examens_show", methods={"GET"})
     */
    public function show(OcExamens $ocExamen): Response
    {
        return $this->render('oc_examens/show.html.twig', [
            'oc_examen' => $ocExamen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_oc_examens_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, OcExamens $ocExamen, OcExamensRepository $ocExamensRepository): Response
    {
        $form = $this->createForm(OcExamensType::class, $ocExamen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ocExamensRepository->add($ocExamen, true);

            return $this->redirectToRoute('app_oc_examens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oc_examens/edit.html.twig', [
            'oc_examen' => $ocExamen,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oc_examens_delete", methods={"POST"})
     */
    public function delete(Request $request, OcExamens $ocExamen, OcExamensRepository $ocExamensRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ocExamen->getId(), $request->request->get('_token'))) {
            $ocExamensRepository->remove($ocExamen, true);
        }

        return $this->redirectToRoute('app_oc_examens_index', [], Response::HTTP_SEE_OTHER);
    }
}
