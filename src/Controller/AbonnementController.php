<?php

namespace App\Controller\API;

use App\Repository\AbonnementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AbonnementController extends AbstractController
{
    #[Route('/api/abonnement')]
    public function index(AbonnementRepository $repository) : Response
    {
        $abonnement = $repository -> findAll();
        return $this->json($abonnement, 200 , [], ['groups' => 'abonnement.index']);
    }
}
