<?php

namespace App\Service\V1\Classification;

use App\Repository\V1\Classification\ClassificationRepository;



class ClassificationServiceDelete
{

    protected $classificationRepository;

    public function __construct(ClassificationRepository $classificationRepository
    )
    {
        $this->classificationRepository = $classificationRepository;
    }

    public function delete(int $id)
    {        
        return $this->classificationRepository->delete($id);
    }
    
}
