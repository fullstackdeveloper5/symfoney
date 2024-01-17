<?php

namespace App\Controller;

use App\Entity\Dog;
use App\Entity\Cat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/create-animals', name: 'animals', methods: ['POST'])]
    public function index(): Response
    {

        // Create a dog
        $dog = new Dog();
        $dog->setName('Buddy1');
        $dog->setBreed('Labrador1');
        $this->entityManager->persist($dog);

        // Create a cat
        $cat = new Cat();
        $cat->setName('Whiskers1');
        $cat->setHasTail(true);
        $this->entityManager->persist($cat);

        $this->entityManager->flush();

        return $this->render('animal/index.html.twig', [
            'controller_name' => 'AnimalController',
        ]);
    }
}
