<?php

namespace App\Repository\V1\Classification;

use App\Models\Classification;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class ClassificationRepository extends BaseRepository
{

    public function __construct(Classification $classification)
    {
        parent::__construct($classification);
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $classification = $this->obj->create($attributes);
            DB::commit();
            return $classification;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $classification = $this->obj->find($id)->updateOrCreate([
                'id'   => $id,
            ],$attributes);
            DB::commit();            
            return $classification;
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
