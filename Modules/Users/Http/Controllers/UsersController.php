<?php namespace Modules\Users\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\Http\Requests\RequestCreateUser;
use Modules\Users\Http\Requests\RequestUpdateUser;
use Illuminate\Routing\Controller;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    private $repo;

    public function __construct( \UserControllerRepository $repo)
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
    public function store(RequestCreateUser $request)
    {
        return $this->repo->store($request);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show(\User $user)
    {
        return $this->repo->show($user);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(\User $user)
    {
        return $this->repo->edit($user);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(\User $user, RequestUpdateUser $request)
    {
        return $this->repo->update($user, $request);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(\User $user)
    {
        return $this->repo->destroy($user);
    }
}
