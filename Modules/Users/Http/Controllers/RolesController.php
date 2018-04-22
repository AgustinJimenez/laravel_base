<?php namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\Http\Requests\RequestCreateRole;
use Modules\Users\Http\Requests\RequestUpdateRole;
use Illuminate\Routing\Controller;
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public $repo;
    public function __construct( \RolesControllerRepository $repo )
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return $this->repo->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(RequestCreateRole $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(\Role $role)
    {
        return $this->repo->show($role);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(\Role $role)
    {
        return $this->repo->edit($role);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(\Role $role, RequestUpdateRole $request)
    {
        return $this->repo->update($role, $request);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(\Role $role)
    {
        return $this->repo->destroy($role);
    }
}
