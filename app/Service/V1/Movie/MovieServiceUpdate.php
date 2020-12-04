<?php

namespace App\Service\V1\Movie;

use Illuminate\Http\Request;
use App\Repository\V1\Movie\MovieRepository;
use Validator;
use App\Service\V1\Actuation\ActuationServiceCreateOrUpdate;
class MovieServiceUpdate
{

    use Traits\RuleTrait;

    protected $movieRepository;
    protected $actuationServiceRegistration;

    public function __construct(MovieRepository $movieRepository,
            ActuationServiceCreateOrUpdate $actuationServiceCreateOrUpdate
    )
    {
        $this->movieRepository = $movieRepository;
        $this->actuationServiceCreateOrUpdate = $actuationServiceCreateOrUpdate;
        
    }

    public function update(int $id, Request $request)
    {
        $attributes = $request->all();

        $validator = Validator::make($request->all(), $this->rules($id));

        if ($validator->fails()) {
            return $validator->errors();
        }

        $movie = $this->movieRepository->update($id, $attributes);

        if ($movie) {
            if (!empty($attributes['actors'])) {
                $this->actuationServiceCreateOrUpdate->firstOrNew($movie->id, $attributes['actors']);
            }
        }

        return $movie;
    }

}
