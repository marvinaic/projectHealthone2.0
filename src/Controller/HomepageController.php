<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomepageController extends AbstractController
{
    /**
     * @\Symfony\Component\Routing\Annotation\Route("/")
     */
    public function homepage()
    {
        //return $this->render('home.html.twig', [ ]);
        $medication = [
            'pil',
            'zalf',
            'prik',
        ];
        return $this->render('medication.html.twig', [
            'medication' => $medication,
        ]);
    }
    /*
    /**
     * @\Symfony\Component\Routing\Annotation\Route("/medication")
     */
    /*
    public function displayMedication()
    {
        return new Response("medicine");
    }
   /* /**
      * @Route("/news/{slug}")
      */
    /*
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show the article: "%s"',
            $slug
        ));
    }
   */

}