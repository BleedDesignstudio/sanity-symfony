<?php

namespace App\Controller;

use App\Service\SanityClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
   /**
    * @Route("/movies", name="movies")
    */
   public function index()
   {
      $sanity = SanityClient::register();

      $query = '
      *[_type == "movie"] {
        _id,
        title,
        releaseDate,
  
        "director": crewMembers[job == "Director"][0].person->name,
        "posterUrl": poster.asset->url
      }[0...50]';
  
      $movies = $sanity->fetch($query);

      return $this->render('movies/index.html.twig', [
         'movies' => $movies
      ]);
   }
}
