<?php

namespace App\Repository\V1\Movie;

use App\Models\Actuation;
use App\Repository\V1\BaseRepository;

class ActuationRepository extends BaseRepository
{

    public function __construct(Actuation $actuation)
    {
        parent::__construct($actuation);
    }

    public function firstOrNew(int $movieId, array $actors): object
    {
        foreach ($actors as $actor) {
            $actuation = $this->obj->firstOrNew(
                    [
                        'actor_id' => intval($actor['id']),
                        'movie_id' => $movieId
            ]);
            $actuation->actor_id = $actor['id'];
            $actuation->movie_id = $movieId;
            $notDelete[] = $actuation->id;
            $actuation->save();
        }

        $this->obj->where('movie_id', $movieId)
                ->whereNotIn('id', $notDelete)->get()
                ->each(function($obj) {
                    $obj->delete();
                });

        return $actuation;
    }

}
