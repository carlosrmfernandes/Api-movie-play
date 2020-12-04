<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Classification\ClassificationServiceRegistration;
use App\Http\Controllers\Controller;
use App\Service\V1\Classification\ClassificationServiceUpdate;
use App\Service\V1\Classification\ClassificationServiceDelete;

class ClassificationController extends Controller
{

    protected $classificationServiceRegistration;
    protected $classificationServiceUpdate;
    protected $classificationServiceDelete;

    public function __construct(
        ClassificationServiceRegistration $classificationServiceRegistration, 
        ClassificationServiceUpdate $classificationServiceUpdate,
        ClassificationServiceDelete $classificationServiceDelete
    )
    {
        $this->classificationServiceRegistration = $classificationServiceRegistration;
        $this->classificationServiceUpdate = $classificationServiceUpdate;
        $this->classificationServiceDelete = $classificationServiceDelete;
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
        $classification = $this->classificationServiceRegistration->store($request);

        return response()->json(['data' => $classification]);
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
        
        $classification = $this->classificationServiceUpdate->update($id,$request);

        return response()->json(['data' => $classification]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $classification = $this->classificationServiceDelete->delete($id);

        return response()->json(['data' => $classification]);
    }

}
