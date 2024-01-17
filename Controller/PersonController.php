<?php
// src/Controller/PersonController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Student;
use App\Entity\Teacher;

class PersonController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/create-student', name: 'create_student')]
    public function createStudent(): Response
    {

        $student = new Student();
        $student->setName('John Doe');
        $student->setStudentId('S12345');

        $this->entityManager->persist($student);
        $this->entityManager->flush();

        return new Response('Student created with ID: ' . $student->getId());
    }

    #[Route('/create-teacher', name: 'create_teacher')]
    public function createTeacher(): Response
    {

        $teacher = new Teacher();
        $teacher->setName('Jane Doe');
        $teacher->setEmployeeId('T67890');

        $this->entityManager->persist($teacher);
        $this->entityManager->flush();

        return new Response('Teacher created with ID: ' . $teacher->getId());
    }

    #[Route('/get-student/{id}', name: 'get_student')]
    public function getStudent(int $id): Response
    {
        $student = $this->entityManager->getRepository(Student::class)->find($id);

        if (!$student) {
            throw $this->createNotFoundException('Student not found for ID ' . $id);
        }

        return new Response('Student Name: ' . $student->getName() . '<br>Student ID: ' . $student->getStudentId());
    }

    #[Route('/get-teacher/{id}', name: 'get_teacher')]
    public function getTeacher(int $id): Response
    {
        $teacher = $this->entityManager->getRepository(Teacher::class)->find($id);

        if (!$teacher) {
            throw $this->createNotFoundException('Teacher not found for ID ' . $id);
        }

        return new Response('Teacher Name: ' . $teacher->getName() . '<br>Employee ID: ' . $teacher->getEmployeeId());
    }
}

