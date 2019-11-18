<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RankingRepository;

class RankingController extends AbstractController
{
    /**
     * @Route("/ranking", name="ranking_news")
     */
    public function news(RankingRepository $rankingRepo)
    {
        $data = $rankingRepo->findUnderOneMonth();
        return $this->render('ranking/news.html.twig', [
            'results' => $data
        ]);
    }

    
}
