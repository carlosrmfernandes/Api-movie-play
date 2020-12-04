<?php

namespace App\Service\V1\User;

use App\Repository\V1\User\UserRepository;



class UserServiceDelete
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function delete(int $id)
    {        
        return $this->userRepository->delete($id);
    }
    
}
