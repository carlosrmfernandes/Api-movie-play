<?php

namespace App\Service\V1\User;

use Illuminate\Http\Request;
use App\Repository\V1\User\UserRepository;
use function bcrypt;
use Validator;

class UserServiceRegistration
{
    use Traits\RuleTrait;
    protected $userRepositor;

    public function __construct(UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $validator->errors();                        
        }
        
        $attributes['password'] = bcrypt($attributes['password']);       
        
        return $this->userRepository->save($attributes);
    }
    
}
