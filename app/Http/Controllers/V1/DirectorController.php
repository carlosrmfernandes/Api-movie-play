<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Director\DirectorServiceRegistration;
use App\Http\Controllers\Controller;
use App\Service\V1\User\DirectorServiceUpdate;
use App\Service\V1\Director\DirectorServiceDelete;

class DirectorController extends Controller
{

    protected $directorServiceRegistration;
    protected $directorServiceUpdate;
    protected $directorServiceDelete;

    public function __construct(
        DirectorServiceRegistration $directorServiceRegistration, 
        DirectorServiceUpdate $directorServiceUpdate,
        DirectorServiceDelete $directorServiceDelete
    )
    {
        $this->directorServiceUpdate = $directorServiceUpdate;
        $this->directorServiceRegistration = $directorServiceRegistration;
        $this->directorServiceDelete = $directorServiceDelete;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): object
    {
        $director = $this->directorServiceRegistration->store($request);

        return response()->json(['data' => $director]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        
        $director = $this->directorServiceUpdate->update($id,$request);

        return response()->json(['data' => $director]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $director = $this->directorServiceDelete->delete($id);

        return response()->json(['data' => $director]);
    }

}
