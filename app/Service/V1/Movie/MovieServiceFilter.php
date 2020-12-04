<?php

namespace App\Service\V1\Movie;

use App\Repository\V1\Movie\MovieRepository;

class MovieServiceFilter
{

    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository
    )
    {
        $this->movieRepository = $movieRepository;
    }

    public function filter($searchQuery)
    {        
        $movie = $this->movieRepository->filter($searchQuery);
        
        return $movie;
    }

}
