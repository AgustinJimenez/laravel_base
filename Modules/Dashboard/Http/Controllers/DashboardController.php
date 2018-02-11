<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends \AdminController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $request = request();
        $server_datas = collect($request->server());
        $server_datas = $server_datas->except
        ([ 
            'REQUEST_URI', 
            'REQUEST_METHOD', 
            'SCRIPT_NAME', 
            'SCRIPT_FILENAME', 
            'PATH_INFO', 
            'PHP_SELF', 
            'HTTP_CONNECTION', 
            'HTTP_CACHE_CONTROL', 
            'HTTP_UPGRADE_INSECURE_REQUESTS', 
            'HTTP_ACCEPT', 
            'HTTP_DNT' 
        ]);

        return view('dashboard::index', compact('server_datas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('dashboard::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('dashboard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('dashboard::edit');
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
