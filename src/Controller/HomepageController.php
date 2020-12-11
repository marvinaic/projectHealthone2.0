<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomepageController
{
    /**
     * @\Symfony\Component\Routing\Annotation\Route("/")
     */
    public function homepage()
    {
        return new Response("home");
    }
    /**
     * @\Symfony\Component\Routing\Annotation\Route("/medication")
     */
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