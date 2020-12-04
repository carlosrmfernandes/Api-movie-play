<?php

namespace App\Service\V1\Director;

use Illuminate\Http\Request;
use App\Repository\V1\Director\DirectorRepository;
use Validator;

class DirectorServiceRegistration
{
    use Traits\RuleTrait; 
    protected $directorRepository;

    public function __construct(DirectorRepository $directorRepository
    )
    {
        $this->directorRepository = $directorRepository;
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $validator->errors();                        
        }
                        
        return $this->directorRepository->save($attributes);
    }
    
}
