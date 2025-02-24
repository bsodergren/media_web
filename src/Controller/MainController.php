<?php

namespace App\Controller;

use App\Entity\VideoFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homepage(EntityManagerInterface $entityManager): Response
    {
        $videoFile = $entityManager->getRepository(VideoFile::class)->getLibrarys();

        // $myShip = $videoFile[array_rand($videoFile)];
        dd($videoFile);

        return $this->render('main/homepage.html.twig', [
            'myShip' => $myShip,
            'ships' => $ships,
        ]);
    }
}
