<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RecipeController extends AbstractController
{
    // Route pour afficher toutes les recettes
    #[Route('/recipes/index', name: 'app_recipes')]
    public function index(RecipeRepository $recipeRepository): Response
    {
        // Utilisation de service externe

        $recipes = $recipeRepository->findAll();
        // dump and die
        // dd($recipes);


        return $this->render('recipe/index.html.twig', [
            "recipes" => $recipes,
        ]);
    }

    // Route pour afficher une recette par son ID
    #[Route('/recipe/{id}', name: 'app_recipe.show', requirements: ['id' => '\d+'])]
    public function recipe(int $id, RecipeRepository $recipeRepository): Response
    {
        // Utilisation de service externe
        $recipe = $recipeRepository->find($id);

        return $this->render('recipe/show.html.twig', [
            "recipe" => $recipe
        ]);
    }

    //Route pour créer une recette
    #[Route('/recipe/create', name: 'app_recipe_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $recipe = new Recipe();

        $recipeForm = $this->createForm(RecipeType::class, $recipe);
        $recipeForm->handleRequest($request);

        if ($recipeForm->isSubmitted() && $recipeForm->isValid()) {
            $entityManager->persist($recipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_recipes');
        }

        return $this->render('recipe/create.html.twig', [
            "recipeForm" => $recipeForm->createView()
        ]);
    }

    // #[Route('/recipe/update', name: 'app_recipe_update')]
    // public function update(Request $request, EntityManagerInterface $entityManager, RecipeRepository $recipeRepository): Response
    // {
    //     $recipe = $recipeRepository->find-($id);

    //     $recipeForm = $this->createForm(RecipeType::class, $recipe);
    //     $recipeForm->handleRequest($request);

    //     if($recipeForm->isSubmitted() && $recipeForm->isValid()){

    //         $entityManager->persist($recipe);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_recipes_all');
    //     }

    // }

    // Route pour afficher une recette par son slug
    #[Route('/recipe/{slug}', name: 'app_recipe.show')]
    public function showByName(string $slug, RecipeRepository $recipeRepository): Response
    {
        $recipe = $recipeRepository->findOneBy(["slug" => $slug]);

        return $this->render('recipe/show.html.twig', [
            "recipe" => $recipe
        ]);
    }

    // Route pour supprimer une recette par son ID
    #[Route('/recipe/{id}/delete', name: 'app_recipe_delete')]
    public function delete(int $id, RecipeRepository $recipeRepository, EntityManagerInterface $entityManager): Response
    {

        $recipe = $recipeRepository->find($id);

        $entityManager->remove($recipe);
        $entityManager->flush();

        return $this->redirectToRoute('app_recipe_all');
    }
}
