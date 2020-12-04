<?php

namespace App\Service\V1\Actuation;

use App\Repository\V1\Movie\ActuationRepository;

class ActuationServiceCreateOrUpdate
{

    protected $actuationRepository;

    public function __construct(ActuationRepository $actuationRepository
    )
    {
        $this->actuationRepository = $actuationRepository;
    }

    public function firstOrNew(int $movieId, array $actors)
    {
        $this->actuationRepository->firstOrNew($movieId, $actors);
    }

}
