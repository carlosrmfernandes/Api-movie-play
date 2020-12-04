<?php

namespace App\Service\V1\Director;

use App\Repository\V1\Director\DirectorRepository;

class DirectorServiceDelete
{

    protected $directorRepository;

    public function __construct(DirectorRepository $directorRepository
    )
    {
        $this->directorRepository = $directorRepository;
    }

    public function delete(int $id)
    {        
        return $this->directorRepository->delete($id);
    }
    
}
