<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Label;


class LabelController extends AbstractController
{
    /**
     * @Route("/label/{id}", name="label_show")
     */
    public function artistList(Label $label)
    {
        return $this->render('label/show.html.twig',  [
            'label' => $label
        ]);
    }
}
