<?php

namespace App\Controller;

use App\Service\TmdbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;

class FilmController extends AbstractController
{
    #[Route('/api/films/popular', name: 'films_popular', methods: ['GET'])]
    public function getPopularFilms(TmdbService $tmdbService): JsonResponse
    {
        $films = $tmdbService->getPopularMovies();
        return $this->json($films);
    }

    #[Route('/api/film/{id}', name: 'film_detail', methods: ['GET'])]
    public function getFilmDetail(int $id, TmdbService $tmdbService): JsonResponse
    {
        $film = $tmdbService->getMovie($id);
        return $this->json($film);
    }

    #[Route('/api/films/search/{query}', name: 'films_search', methods: ['GET'])]
    public function searchFilms(string $query, TmdbService $tmdbService): JsonResponse
    {
        $films = $tmdbService->searchMovies($query);
        return $this->json($films);
    }

    // utilisation les données de TMDB pour remplir i'entité Film

    #[Route('/api/import/film/{id}', name: 'import_film', methods: ['POST'])]
    public function importFilm(int $id, TmdbService $tmdbService, EntityManagerInterface $em): JsonResponse
    {
        $data = $tmdbService->getMovie($id);

        $film = new Film();
        $film->setTitre($data['title']);
        $film->setSynopsis($data['overview']);
        $film->setDateSortie(new \DateTime($data['release_date']));
        $film->setNoteMoyenne($data['vote_average']);
        $film->setPosterPath($data['poster_path']);
        $film->setCreatedAt(new \DateTime());
        $film->setUpdatedAt(new \DateTime());

        $em->persist($film);
        $em->flush();

        return $this->json(['message' => 'Film importé avec succès', 'id' => $film->getId()]);
    }
}