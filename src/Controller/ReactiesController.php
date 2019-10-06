<?php

namespace App\Controller;

use App\Entity\Reacties;
use App\Form\ReactiesType;
use App\Repository\ReactiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reacties")
 */
class ReactiesController extends AbstractController
{
    /**
     * @Route("/", name="reacties_index", methods={"GET"})
     */
    public function index(ReactiesRepository $reactiesRepository): Response
    {
        return $this->render('reacties/index.html.twig', [
            'reacties' => $reactiesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="reacties_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $reacty = new Reacties();
        $form = $this->createForm(ReactiesType::class, $reacty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reacty);
            $entityManager->flush();

            return $this->redirectToRoute('reacties_index');
        }

        return $this->render('reacties/new.html.twig', [
            'reacty' => $reacty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reacties_show", methods={"GET"})
     */
    public function show(Reacties $reacty): Response
    {
        return $this->render('reacties/show.html.twig', [
            'reacty' => $reacty,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="reacties_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Reacties $reacty): Response
    {
        $form = $this->createForm(ReactiesType::class, $reacty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reacties_index');
        }

        return $this->render('reacties/edit.html.twig', [
            'reacty' => $reacty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="reacties_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Reacties $reacty): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reacty->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reacty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reacties_index');
    }
}
