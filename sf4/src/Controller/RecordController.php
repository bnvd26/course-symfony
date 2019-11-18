<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Record;

class RecordController extends AbstractController
{
    /**
     * @Route("/record", name="record")
     */
    public function index()
    {
        return $this->render('record/index.html.twig', [
            'controller_name' => 'RecordController',
        ]);
    }

    /**
     * @Route("/record/{id}", name="record_show")
     */
    public function showRecord(Record $record)
    {
        return $this->render('record/show.html.twig', [
            'record'=>$record,
        ]);
    }
}
