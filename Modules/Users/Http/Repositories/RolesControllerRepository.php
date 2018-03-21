<?php namespace Modules\Users\Http\Repositories;

class RolesControllerRepository
{
    public $roles_repo;
    public $permissions_repo;

    public function __construct( \RolesRepository $roles_repo, \PermissionsRepository $permissions_repo )
    {
        $this->roles_repo = $roles_repo;
        $this->permissions_repo = $permissions_repo;
    }

    public function index()
    {
        $roles = $this->roles_repo->role->get();
        return view( $this->roles_repo->role->view_name_index, compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view( $this->roles_repo->role->view_name_create, 
                    [
                        'role' => $this->roles_repo->role, 
                        'permissions' => $this->permissions_repo->verify_and_get_permissions()
                    ]
                );
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(&$request)
    {

        $role = $this->roles_repo->role->create( $request->only(['name']) );

        if( $request->filled('permissions') )
            $role->givePermissionTo
            (
                $this->permissions_repo->permission->find( array_keys($request->permissions) )->pluck('name')->toArray()
            );

        return redirect()->route( $this->roles_repo->role->route_name_index )->withSuccess( \Lang::get("users::users.messages.roles.created") );
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view( $this->roles_repo->role->view_name_show );
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(&$role)
    {
        return view( $this->roles_repo->role->view_name_edit, 
                [
                    'role' => $role,
                    'permissions' => $this->permissions_repo->verify_and_get_permissions()
                ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(&$role, &$request)
    {
        $role->update( $request->only(['name']) );

        if( $request->filled('permissions') )
            $role->syncPermissions
            (
                $this->permissions_repo->permission->find( array_keys($request->permissions) )->pluck('name')->toArray()
            );

        return redirect()->route( $this->roles_repo->role->route_name_index )->withSuccess( \Lang::get("users::users.messages.roles.updated") );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(&$role)
    {
        $role->delete();
        return redirect()->route( $this->roles_repo->role->route_name_index )->withSuccess( \Lang::get("users::users.messages.roles.deleted") );
    }

}