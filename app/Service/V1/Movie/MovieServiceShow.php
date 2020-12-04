<?php

namespace App\Service\V1\Movie;

use App\Repository\V1\Movie\MovieRepository;

class MovieServiceShow
{

    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository
    )
    {
        $this->movieRepository = $movieRepository;
    }

    public function show(int $id)
    {        
        $movie = $this->movieRepository->find($id);
        
        return $movie;
    }

}
