<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Modules\Media\Http\Requests\UploadMediaRequest;
use Modules\Media\Repositories\MediaRepository;
class MediaController extends Controller
{
    public function __construct( MediaRepository $repo )
    {
        $this->repo = $repo;
    }
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
        return Datatables::of( $this->repo->media->query() )
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
            return '<img src="' . $this->repo->media_url($row->get_thumbnail_name()) . '">';
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
        return view('media::admin.form', ['media' => $this->repo->media]);
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
                    $this->repo->upload($file)->create_medium_small_thumbnails();
        
        return response()->json(['error' => false]);
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
    public function edit($media_id)
    {
        return response()->json(['error' => false, 'messages' => 'Hello from edit-'.$media_id]);
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
    public function destroy($media_id)
    {
        return response()->json(['error' => false, 'data' => array('media_id' => $media_id) ]);
    }


}
