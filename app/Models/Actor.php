<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

/**
 * Description of Establishment
 *
 * @author carlosfernandes
 */
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'contact',
    ];
    protected $visible = [
        'id', 'name', 'contact',
    ];   
}