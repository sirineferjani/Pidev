<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActiviteRepository;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(activiteRepository $activiteRepository): Response
    {
        return $this->render('home_page/index.html.twig', [
            'activite' => $activiteRepository->findAll()
        ]);
    }
}
