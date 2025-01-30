<?php

namespace App\Controller;

use App\Entity\Test;
use App\Form\TestType;
use App\Repository\TestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/test')]
final class TestController extends AbstractController
{
    #[Route('/', name: 'app_test')]
    public function index(TestRepository $testRepository): Response
    {

        $tests = $testRepository->findAll();

        return $this->render('test/index.html.twig', [
            'tests' => $tests,
        ]);
    }

    #[Route('/create', name: 'app_test_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $test = new Test();

        $testForm = $this->createForm(TestType::class, $test);
        $testForm->handleRequest($request);

        if($testForm->isSubmitted() && $testForm->isValid()) {
        //    dd($test);
            $entityManager->persist($test);
            $entityManager->flush();

            return $this->redirectToRoute('app_test');
            
        }
        

        return $this->render('test/create.html.twig', [
            "testForm" => $testForm
        ]);
    }

    #[Route('/update/{id}', name: 'app_test_update')]
    public function update(int $id, Request $request, EntityManagerInterface $entityManager, 
    TestRepository $testRepository): Response
    {
        $test = $testRepository->find($id);

        $testForm = $this->createForm(TestType::class, $test);
        $testForm->handleRequest($request);

        if($testForm->isSubmitted() && $testForm->isValid()) {
        //    dd($test);
            $entityManager->persist($test);
            $entityManager->flush();

            return $this->redirectToRoute('app_test_details', ['id' => $test->getId()]);
            
        }
        

        return $this->render('test/create.html.twig', [
            "testForm" => $testForm,
            "test" => $test
        ]);
    }

    #[Route('/delete/{id}', name: 'app_test_delete')]
    public function delete(int $id, TestRepository $testRepository, EntityManagerInterface $entityManager): Response
    {

        $test = $testRepository->find($id);

        $entityManager->remove($test);
        $entityManager->flush();

        return $this->redirectToRoute('app_test');
    }

    #[Route('/{id}', name: 'app_test_details')]
    public function details(int $id, TestRepository $testRepository): Response
    {

        $test = $testRepository->find($id);

        return $this->render('test/show.html.twig', [
            'test' => $test,
        ]);
    }
}
