<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MovieFilters
 *
 * @author carlosfernandes
 */

namespace App\Filters\V1\Movie;
use App\Service\V1\Movie\MovieServiceFilter;
class MovieFilters
{
    
    private $searchQuery;



    public function __construct(MovieServiceFilter $movieServiceFilter
    )
    {
        $this->movieServiceFilter = $movieServiceFilter;
    }

    public function apply($request)
    {
        if (!empty($request['searchQuery'])) {
            $this->searchQuery = $request['searchQuery'];
            
        }        
         return $this->movieServiceFilter->filter($this->searchQuery);
        
    }

}
