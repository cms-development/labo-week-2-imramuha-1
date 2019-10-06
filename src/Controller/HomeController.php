<?php
namespace App\Controller;


use App\Entity\Kampen;
use App\Form\KampenType;
use App\Repository\KampenRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        Gebruik nu de handige render()-functie om een ​​sjabloon weer te geven. Geef het een number variabele door zodat u het in Twig kunt gebruiken
        */


        return $this->render('views/index.html.twig', [
            'kampens' => $kampenRepository->findBy( ['datum' => 'ASC']),
        ]);
    }
}