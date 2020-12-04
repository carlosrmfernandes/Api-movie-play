<?php

namespace App\Service\V1\Actor;

use Illuminate\Http\Request;
use App\Repository\V1\Actor\ActorRepository;
use Validator;

class ActorServiceRegistration
{
    use Traits\RuleTrait;
    protected $actorRepository;

    public function __construct(ActorRepository $actorRepository
    )
    {
        $this->actorRepository = $actorRepository;
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $validator->errors();                        
        }
                        
        return $this->actorRepository->save($attributes);
    }
    
}
