<?php

namespace App\Service\V1\Actor;

use App\Repository\V1\Actor\ActorRepository;



class ActorServiceDelete
{

    protected $actorRepository;

    public function __construct(ActorRepository $actorRepository
    )
    {
        $this->actorRepository = $actorRepository;
    }

    public function delete(int $id)
    {        
        return $this->actorRepository->delete($id);
    }
    
}
