<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/home/{page?1}/{nbre?12}', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, $page, $nbre): Response
    {
        $repository = $doctrine->getRepository(Personne::class);

        $nbPersonne = $repository->count([]);
        $nbrPage = ceil($nbPersonne / $nbre);
        $personne =  $repository->findBy([], [], $nbre, ($page - 1) * $nbre);


        return $this->render('home/index.html.twig', [
            '$personne' =>  $personne,
            'isPaginated' => true,
            'nbrePge' => $nbrPage,
             'page' => $page,
             'nbre' => $nbre
        ]);
    }
}
