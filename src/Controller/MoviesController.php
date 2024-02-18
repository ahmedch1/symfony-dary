<?php

namespace App\Controller;


use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;

    }
    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        // findAll() - SELECT * FROM movies
        // find() - SELECT * FROM movies WHERE id = 5;
        //findBy() - SELECT * FROM movies ORDER BY id DESC
        // findOneBy() - SELECT * FROM movies WHERE id=6 AND title ='the dark knight'
        // count() - SELECT COUNT() from movies WHERE id =1
        $repository=$this->em->getRepository(Movie::class);
        $movies= $repository->findOneBy([],['id'=>'DESC']);
        dd($movies);
        return $this->render('index.html.twig');

    }

    #[Route('/second', name: 'second')]
    public function second(EntityManagerInterface $em): Response
    {
        $repository=$em->getRepository(Movie::class);
        $movies= $repository->findAll();
        dd($movies);
        return $this->render('index.html.twig');

    }
}
