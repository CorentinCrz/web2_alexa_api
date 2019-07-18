<?php

namespace App\Controller;

use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class PlayerController extends AbstractController
{
    /**
     * @Route("/api/players/{lastname<[^\d]+>}", name="player")
     */
    public function index(string $lastname, PlayerRepository $playerRepository)
    {
        $player = $playerRepository->findOneBy(['lastname' => $lastname]);
        if (is_null($player)){
            return new JsonResponse(['error'=>'Not found'], Response::HTTP_NOT_FOUND);
        }
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        $response = new Response();
        $response->setContent($serializer->serialize($player, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
