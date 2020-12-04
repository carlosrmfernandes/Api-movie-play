<?php

namespace App\Repository\V1\Movie;

use App\Models\Movie;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class MovieRepository extends BaseRepository
{

    public function __construct(Movie $movie)
    {
        parent::__construct($movie);
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $movie = $this->obj->create($attributes);
            DB::commit();
            return $movie;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $movie = $this->obj->find($id)->updateOrCreate([
                'id' => $id,
                    ], $attributes);
            DB::commit();
            return $movie;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function delete(int $id): bool
    {
        DB::beginTransaction();
        try {
            $this->obj->destroy($id);
            DB::commit();
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function find(int $id): object
    {
        $movie = $this->obj->with('director')
                ->with('classification')
                ->with('actors')
                ->find($id);
        if ($movie) {
            return $movie;
        } else {
            return new \stdClass();
        }
    }

    public function filter($searchQuery)
    {

        if ($searchQuery) {

            return $this->obj->with('director')
                            ->with('classification')
                            ->with('actors')
                            ->where('title', 'ilike', '%' . $searchQuery . '%')->get();
        }

        return $this->obj->with('director')
                        ->with('classification')
                        ->with('actors')
                        ->get();
    }

}
