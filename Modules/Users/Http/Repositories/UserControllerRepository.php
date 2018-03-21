<?php namespace Modules\Users\Http\Repositories;

use Illuminate\Http\Request;
class UserControllerRepository
{
    private $users_repo;
    private $roles_repo;

    public function __construct( \UserRepository $users_repo, \RolesRepository $roles_repo )
    {
        $this->users_repo = $users_repo;
        $this->roles_repo = $roles_repo;
    }

    public function index()
    {
        $users = $this->users_repo->user->get();
        return view( $this->users_repo->user->view_name_index, compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view( $this->users_repo->user->view_name_create, 
        [
            'user' => $this->users_repo->user,
            'roles' => $this->roles_repo->role->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(&$request)
    {
        \DB::beginTransaction();
        
        $user = $this->users_repo->user->create( $request->only(['name', 'email', 'password']) );

        if( $request->filled('roles') )
            $user->assignRole
            (
                $this->roles_repo->role->find( array_keys($request->roles) )->pluck('name')->toArray()
            );

        \DB::commit();

        return redirect()->route( $this->users_repo->user->route_name_index )->withSuccess( \Lang::get("users::users.messages.users.created")  );
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view( $this->users_repo->user->view_name_show );
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(&$user)
    {
        return view( $this->users_repo->user->view_name_edit, 
        [
            'user' => $user,
            'roles' => $this->roles_repo->role->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(&$user, &$request)
    {
        \DB::beginTransaction();

        $user->update( $request->only(['name', 'email', 'password']) );

        if( $request->filled('roles') )
            $user->syncRoles
            (
                $this->roles_repo->role->find( array_keys($request->roles) )->pluck('name')->toArray()
            );

        \DB::commit();

        return redirect()->route( $user->route_name_index )->withSuccess( \Lang::get("users::users.messages.users.updated") );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(&$user)
    {
        $results = $user->delete();

        return redirect()->route( $user->route_name_index )->withSuccess( \Lang::get("users::users.messages.users.deleted") );
    }

}