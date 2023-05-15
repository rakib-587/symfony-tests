<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function index(UserRepository $user): Response
    {
        $user = new User();
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->render('home/index.html.twig', [
            'user' => $user,
        ]);
    }
}
