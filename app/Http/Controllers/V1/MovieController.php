<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Movie\MovieServiceRegistration;
use App\Http\Controllers\Controller;
use App\Service\V1\Movie\MovieServiceUpdate;
use App\Service\V1\Movie\MovieServiceShow;
use App\Service\V1\Movie\MovieServiceDelete;
use App\Filters\V1\Movie\MovieFilters;

class MovieController extends Controller
{

    protected $movieServiceRegistration;
    protected $movieServiceUpdate;
    protected $movieServiceDelete;
    protected $movieServiceShow;

    public function __construct(
        MovieServiceRegistration $movieServiceRegistration,
        MovieServiceUpdate $movieServiceUpdate, 
        MovieServiceDelete $movieServiceDelete, 
        MovieServiceShow $movieServiceShow,
        MovieFilters $movieFilters
    )
    {
        $this->movieServiceUpdate = $movieServiceUpdate;
        $this->movieServiceRegistration = $movieServiceRegistration;
        $this->movieServiceDelete = $movieServiceDelete;
        $this->movieServiceShow = $movieServiceShow;
        $this->movieFilters = $movieFilters;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $movie = $this->movieFilters->apply($request->all());
        return response()->json(['data' => $movie]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): object
    {
        $movie = $this->movieServiceRegistration->store($request);

        return response()->json(['data' => $movie]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = $this->movieServiceShow->show($id);
        return response()->json(['data' => $movie]);
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

        $movie = $this->movieServiceUpdate->update($id, $request);

        return response()->json(['data' => $movie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = $this->movieServiceDelete->delete($id);

        return response()->json(['data' => $movie]);
    }

}
