<?php

namespace App\Service\V1\User;

use Illuminate\Http\Request;
use App\Repository\V1\Director\DirectorRepository;
use Validator;

class DirectorServiceUpdate
{

    use \App\Service\V1\Director\Traits\RuleTrait;

    protected $directorRepository;

    public function __construct(DirectorRepository $directorRepository
    )
    {
        $this->directorRepository = $directorRepository;
    }

    public function update(int $id, Request $request)
    {
        $attributes = $request->all();

        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return $validator->errors();
        }
        
        return $this->directorRepository->update($id, $attributes);
    }

}
