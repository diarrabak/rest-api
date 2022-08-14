<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\AcademicgroupCollection;
use App\Http\Resources\Api\AcademicgroupResource;
use App\Models\Academicgroup;
use Illuminate\Http\Request;

class AcademicgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return new AcademicgroupCollection(Academicgroup::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Academicgroup  $academicgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Academicgroup $academicgroup)
    {
       return new AcademicgroupResource($academicgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Academicgroup  $academicgroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academicgroup $academicgroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Academicgroup  $academicgroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academicgroup $academicgroup)
    {
        //
    }
}
