<?php

namespace App\Repository\V1\Director;

use App\Models\Director;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class DirectorRepository extends BaseRepository
{

    public function __construct(Director $director)
    {
        parent::__construct($director);
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $director = $this->obj->create($attributes);
            DB::commit();
            return $director;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $director = $this->obj->find($id)->updateOrCreate([
                'id'   => $id,
            ],$attributes);
            DB::commit();            
            return $director;
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
