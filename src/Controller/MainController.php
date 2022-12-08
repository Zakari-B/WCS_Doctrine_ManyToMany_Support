<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CatRepository;
use App\Repository\HumanRepository;

#[Route('/', name: 'app_')]
class MainController extends AbstractController
{
    #[Route('index', name: 'index')]
    public function index(CatRepository $catRepository, HumanRepository $humanRepository): Response
    {
        $cats = $catRepository->findAll();
        $humans = $humanRepository->findAll();

        return $this->render('main/index.html.twig', [
            'cats' => $cats,
            'humans' => $humans
        ]);
    }
}
