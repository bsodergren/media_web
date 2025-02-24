<?php

namespace App\Controller;

use App\Entity\VideoFile;
use App\Entity\VideoMetaData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


final class VideoFileController extends AbstractController
{
    #[Route('/video', name: 'product_show')]
    public function show(EntityManagerInterface $entityManager,Request $request): Response
    {
        $videoFile = $entityManager->getRepository(VideoFile::class)->findBy(['library' => 'Pornhub']);

        $videoList = [];
        $plex_home = $this->getParameter('app.PLEX_HOME');
        $VIDEO_PATH = $this->getParameter('app.VIDEO_PATH');

        foreach($videoFile as $i => $video){


            $filename = $video->getFilepath().DIRECTORY_SEPARATOR.$video->getFilename();

            $filename = str_replace($plex_home, $VIDEO_PATH, $filename);
            
            $filename = "http://".$request->server->get('HTTP_HOST') . $filename;

            $videoList[$i]['url'] = $filename;
            $videoList[$i]['name'] = $video->getFilename();

            $videoData = $entityManager->getRepository(VideoMetaData::class)->findOneBy(['videokey'=> $video->getVideokey()]);
            if($videoData !== null) {
                $videoList[$i]['metadata'] = [
                    'title' => $videoData->getTitle(),
                    'studio'=> $videoData->getStudio(),
                    'artist'=> $videoData->getArtist(),
                    'genre'=> $videoData->getGenre()
                ];
            }



        }
        // dd($videoList);
       
        // dd($videoData->getTitle());

       // $signUpPage = $this->generateUrl($filename , [], UrlGeneratorInterface::ABSOLUTE_URL);

        // return new Response('Check out this great product: '.$filename);

        return $this->render('video_file/index.html.twig', [
            'video_file' =>  $videoList,
        ]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    #[Route('/video/file', name: 'app_video_file')]
    public function index(): Response
    {
        return $this->render('video_file/index.html.twig', [
            'controller_name' => 'VideoFileController',
        ]);
    }
}
