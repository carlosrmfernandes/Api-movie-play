<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Actor\ActorServiceRegistration;
use App\Http\Controllers\Controller;
use App\Service\V1\Actor\ActorServiceUpdate;
use App\Service\V1\Actor\ActorServiceDelete;

class ActorController extends Controller
{

    protected $actorServiceRegistration;
    protected $actorServiceUpdate;
    protected $actorServiceDelete;

    public function __construct(
        ActorServiceRegistration $actorServiceRegistration, 
        ActorServiceUpdate $actorServiceUpdate,
        ActorServiceDelete $actorServiceDelete
    )
    {
        $this->actorServiceUpdate = $actorServiceUpdate;
        $this->actorServiceRegistration = $actorServiceRegistration;
        $this->actorServiceDelete = $actorServiceDelete;
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
        $actor = $this->actorServiceRegistration->store($request);

        return response()->json(['data' => $actor]);
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
        
        $actor = $this->actorServiceUpdate->update($id,$request);

        return response()->json(['data' => $actor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $actor = $this->actorServiceDelete->delete($id);

        return response()->json(['data' => $actor]);
    }

}
