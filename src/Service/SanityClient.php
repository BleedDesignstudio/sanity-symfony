<?php
namespace App\Service;

use Sanity\Client;
use Symfony\Component\Dotenv\Dotenv;

class SanityClient
{
   public static function register()
   {
      $dotenv = new Dotenv();
      $dotenv->load('../.env');
      
      $options = [
         'projectId' => getenv('SANITY_PROJECT_ID'),
         'dataset' => getenv('SANITY_DATASET'),
         'useCdn' => getenv('SANITY_USE_CDN')
      ];

      return new Client($options);
   }
}