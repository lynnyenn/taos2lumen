<?php

namespace App\Http\Controllers;

//use App\People;
//use Illuminate\Http\Request;

//use App\Http\Requests;

use Laravel\Lumen\Routing\Controller;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$peoples  = People::all();
        $companys = array('asiaa','cfa','unam','ntu');
        $asiaa    = People::company('Asiaa')->get();
        $unam     = People::company('UNAM')->get();
        $cfa      = People::company('CfA')->get();
        $cfa      = People::company('NTU')->get();
        //var_dump($asiaa);
        return view('frontend.about')
               ->with('companys', compact('asiaa','unam','cfa','ntu'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
