<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RuleTrait
 *
 * @author carlosfernandes
 */

namespace App\Service\V1\Movie\Traits;

trait RuleTrait
{

    public function rules($id=null)
    {
        return [
            'title' => 'required|string|max:255|unique:movies,title' . ($id == null ? '' : ',' . $id),
            'director_id' => 'required|integer',
            'classification_id' => 'required|integer',
            
        ];
    }

}
