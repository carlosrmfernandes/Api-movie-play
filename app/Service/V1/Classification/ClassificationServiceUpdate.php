<?php

namespace App\Service\V1\Classification;

use Illuminate\Http\Request;
use App\Repository\V1\Classification\ClassificationRepository;
use Validator;

class ClassificationServiceUpdate
{

    use Traits\RuleTrait;
    protected $classificationRepository;

    public function __construct(ClassificationRepository $classificationRepository
    )
    {
        $this->classificationRepository = $classificationRepository;
    }

    public function update(int $id, Request $request)
    {
        $attributes = $request->all();

        $validator = Validator::make($request->all(), $this->rules($id));

        if ($validator->fails()) {
            return $validator->errors();
        }       
        return $this->classificationRepository->update($id, $attributes);
    }

}
