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

class Movie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'director_id', 'classification_id'
    ];
    protected $visible = [
        'id', 'title', 'director_id', 'classification_id', 'director','classification','actors'
    ];

    function director()
    {
        return $this->hasOne(Director::class, 'id', 'director_id');
    }
    
    function classification()
    {
        return $this->hasOne(Classification::class, 'id', 'director_id');
    }
    
    function actors()
    {
        return $this->belongsToMany(Actor::class, Actuation::class);
    }

}
