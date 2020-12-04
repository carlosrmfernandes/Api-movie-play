<?php

namespace App\Service\V1\Movie;

use App\Repository\V1\Movie\MovieRepository;



class MovieServiceDelete
{

    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository
    )
    {
        $this->movieRepository = $movieRepository;
    }

    public function delete(int $id)
    {        
        return $this->movieRepository->delete($id);
    }
    
}
