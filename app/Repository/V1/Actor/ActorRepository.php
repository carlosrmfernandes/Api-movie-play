<?php

namespace App\Repository\V1\Actor;

use App\Models\Actor;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class ActorRepository extends BaseRepository
{

    public function __construct(Actor $actor)
    {
        parent::__construct($actor);
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $actor = $this->obj->create($attributes);
            DB::commit();
            return $actor;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $actor = $this->obj->find($id)->updateOrCreate([
                'id'   => $id,
            ],$attributes);
            DB::commit();            
            return $actor;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
    
    public function delete(int $id): bool{
        DB::beginTransaction();        
        try {
            $this->obj->destroy($id);
            DB::commit();            
            return true;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }    

}
