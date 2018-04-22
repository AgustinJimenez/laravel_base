<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;

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

    public function index_ajax()
    {
        return Datatables::of( \Media::query() )
                ->addColumn('actions', function ($row)
                {
                    return '<div class="btn-group">
                                <a class="btn btn-flat btn-primary" href=""> <i class="fa fa-pencil"></i> </a>
                                <button class="btn btn-flat btn-danger btn-delete" > <i class="fa fa-trash"></i> </button>
                            </div>
                            ';
                })
                ->addColumn('thumbnail', function ($row)
                {
                    return '<img src="' . $row->getUrl() . '">';
                })
                ->setRowClass( function ($tabla) 
                { 
                    return "text-center"; 
                })
                ->rawColumns(['actions', 'thumbnail'])
                ->make(true);
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
                    \MediaUploader::fromSource( $file )->upload();
                
        
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
