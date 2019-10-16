<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Artist;


class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist_list")
     */
    public function artistList(EntityManagerInterface $em)
    {
        // Creation d'un artist
        $artist = (new Artist())
            ->setName('Benjamin Adida')
            ->setDescription('Ceci est mon premier artiste')
        ;
        // preparation a l'enregistrement
        $em->persist($artist);

        // enregistrement
        $em->flush();
        
        return $this->render('artist/list.html.twig');
    }
}
