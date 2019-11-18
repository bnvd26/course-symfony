<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;
use App\Repository\ArtistRepository;


class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     */
    public function artistList(ArtistRepository $artistRepo)
    {
        $results = $artistRepo->findAll();

        return $this->render('artist/list.html.twig',  [
            'artists' => $results
        ]);
    }

    /**
     * @Route("/artist/{id}", name="artist_show")
     */
    public function artistShow(Artist $artist)
    {        
        return $this->render('artist/show.html.twig', [
            'artist'=>$artist
        ]);
    }
}
