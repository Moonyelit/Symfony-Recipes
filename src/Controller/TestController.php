<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(TestRepository $testRepository): Response
    {

        $tests = $testRepository->findAll();

        return $this->render('test/index.html.twig', [
            'tests' => $tests,
        ]);
    }

    // #[Route('/test', name: 'app_test')]
    // public function index(TestRepository $testRepository): Response
    // {

    //     $tests = $testRepository->findAll();

    //     return $this->render('test/index.html.twig', [
    //         'tests' => $tests,
    //     ]);
    // }
}
