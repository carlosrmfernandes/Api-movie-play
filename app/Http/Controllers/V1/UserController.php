<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\User\UserServiceRegistration;
use App\Http\Controllers\Controller;
use App\Service\V1\User\UserServiceUpdate;
use App\Service\V1\User\UserServiceDelete;

class UserController extends Controller
{

    protected $userServiceRegistration;
    protected $userServiceUpdate;
    protected $userServiceDelete;

    public function __construct(
        UserServiceRegistration $userServiceRegistration, 
        UserServiceUpdate $userServiceUpdate,
        UserServiceDelete $userServiceDelete
    )
    {
        $this->userServiceUpdate = $userServiceUpdate;
        $this->userServiceRegistration = $userServiceRegistration;
        $this->userServiceDelete = $userServiceDelete;
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
        $user = $this->userServiceRegistration->store($request);

        return response()->json(['data' => $user]);
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
        
        $user = $this->userServiceUpdate->update($id,$request);

        return response()->json(['data' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $user = $this->userServiceDelete->delete($id);

        return response()->json(['data' => $user]);
    }

}
