<?php

namespace App\Service\V1\Classification;

use Illuminate\Http\Request;
use App\Repository\V1\Classification\ClassificationRepository;
use Validator;

class ClassificationServiceRegistration
{
    use Traits\RuleTrait;
    protected $classificationRepository;

    public function __construct(ClassificationRepository $classificationRepository
    )
    {
        $this->classificationRepository = $classificationRepository;
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $validator->errors();                        
        }
                      
        return $this->classificationRepository->save($attributes);
    }
    
}
