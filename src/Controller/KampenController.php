<?php

namespace App\Controller;

use App\Entity\Kampen;
use App\Form\KampenType;
use App\Repository\KampenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/**
 * @Route("/kampen")
 */
class KampenController extends AbstractController
{
    /**
     * @Route("/", name="kampen_index", methods={"GET"})
     */
    public function index(KampenRepository $kampenRepository): Response
    {
        return $this->render('kampen/index.html.twig', [
            'kampens' => $kampenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nieuw-kamp", name="kampen_new")
     */
    public function new(Request $request)
    {
        $kampen = new Kampen();
        $form = $this->createForm(KampenType::class, $kampen, [
            'action' => $this->generateUrl('kampen_new'),
            'method' => 'GET',
        ]);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kampen);
            $entityManager->flush();

            return $this->redirectToRoute('kampen_index');
        }

        return $this->render('kampen/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kampen_show", methods={"GET"})
     */
    public function show(Kampen $kampen): Response
    {
        return $this->render('kampen/show.html.twig', [
            'kampen' => $kampen,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kampen_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Kampen $kampen): Response
    {
        $form = $this->createForm(KampenType::class, $kampen);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kampen_index');
        }

        return $this->render('kampen/edit.html.twig', [
            'kampen' => $kampen,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kampen_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Kampen $kampen): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kampen->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kampen);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kampen_index');
    }
}
