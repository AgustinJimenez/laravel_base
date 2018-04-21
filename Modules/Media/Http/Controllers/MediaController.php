<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('media::admin.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('media::admin.form', ['media' => new \Media]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $re)
    {
        if( $re->has('file') )
            foreach ($re->file as $file) 
                if( $file->isValid() )
                {
                    \Imageable( storage_path("app/".$file->store('public')) )->toMediaCollection("public");
                }
        
        return response()->json([ 'error' => false]);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('media::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('media::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
