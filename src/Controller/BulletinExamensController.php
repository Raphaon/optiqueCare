<?php

namespace App\Controller;

use App\Entity\BulletinExamens;
use App\Form\BulletinExamensType;
use App\Repository\BulletinExamensRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bulletin/examens")
 */
class BulletinExamensController extends AbstractController
{
    /**
     * @Route("/", name="app_bulletin_examens_index", methods={"GET"})
     */
    public function index(BulletinExamensRepository $bulletinExamensRepository): Response
    {
        return $this->render('bulletin_examens/index.html.twig', [
            'bulletin_examens' => $bulletinExamensRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_bulletin_examens_new", methods={"GET", "POST"})
     */
    public function new(Request $request, BulletinExamensRepository $bulletinExamensRepository): Response
    {
        $bulletinExamen = new BulletinExamens();
        $form = $this->createForm(BulletinExamensType::class, $bulletinExamen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bulletinExamensRepository->add($bulletinExamen, true);

            return $this->redirectToRoute('app_bulletin_examens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulletin_examens/new.html.twig', [
            'bulletin_examen' => $bulletinExamen,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bulletin_examens_show", methods={"GET"})
     */
    public function show(BulletinExamens $bulletinExamen): Response
    {
        return $this->render('bulletin_examens/show.html.twig', [
            'bulletin_examen' => $bulletinExamen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_bulletin_examens_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BulletinExamens $bulletinExamen, BulletinExamensRepository $bulletinExamensRepository): Response
    {
        $form = $this->createForm(BulletinExamensType::class, $bulletinExamen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bulletinExamensRepository->add($bulletinExamen, true);

            return $this->redirectToRoute('app_bulletin_examens_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bulletin_examens/edit.html.twig', [
            'bulletin_examen' => $bulletinExamen,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_bulletin_examens_delete", methods={"POST"})
     */
    public function delete(Request $request, BulletinExamens $bulletinExamen, BulletinExamensRepository $bulletinExamensRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bulletinExamen->getId(), $request->request->get('_token'))) {
            $bulletinExamensRepository->remove($bulletinExamen, true);
        }

        return $this->redirectToRoute('app_bulletin_examens_index', [], Response::HTTP_SEE_OTHER);
    }
}
