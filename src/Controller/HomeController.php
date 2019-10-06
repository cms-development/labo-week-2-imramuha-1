<?php
namespace App\Controller;


use App\Entity\Kampen;
use App\Form\KampenType;
use App\Repository\KampenRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

// Twig : een templating-taal die gemakkelijk template/sjabloon returneert.
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    // Annotation routes - need package! also routes in the header of controller
    /**
    * @Route("/")
    */
    public function index(KampenRepository $kampenRepository): Response
    {
              
        /*
        $limit = 5;

        $query = $this->getDoctrine()->getEntityManager()->createQuery(
               "SELECT c
                FROM Kampen")

        ->setMaxResults($limit);

        $results = $query->getResult();*/


        return $this->render('views/index.html.twig', [
            'kampens' => $kampenRepository->findBy(array(), array('datum' => 'DESC'), 4),
            'kamp' => $kampenRepository->findBy(array('kijker' => true), array(), 1),
        ]);
    }
}