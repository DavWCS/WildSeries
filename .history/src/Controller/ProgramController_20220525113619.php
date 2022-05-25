<?php

// src/Controller/ProgramController.php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sympfony\src\Repository\ProgramRepository;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController

{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findAll();

        return $this->render('program/index.html.twig',
         ['Program' => $program,
         ]);
    }

    #[Route('/{id}', requirements: ['id'=>'\d+'], methods: ['GET'], name: 'show')]
    public function show(int $id): Response
    {
        return $this->render('program/show.html.twig', ['id' =>$id]);
    }
}