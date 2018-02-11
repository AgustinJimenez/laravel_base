<?php namespace Modules\Users\Http\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserControllerRepository
{
    private $users;
    public function __construct( \UserRepository $users )
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = \User::get();
        return view('users::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $user = new \User;
        return view('users::create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new \User;

        $results = $this->users->safe_store( $user, $request->all() );

        if( $results['error'] )
            return redirect()->back()->withInputs()->withError( $results['messages'][0] );
        else
            return redirect()->route( $this->users->index_route_name )->withSuccess( $this->users->saved_message );
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('users::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(\User $user)
    {
        return view('users::edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(\User $user, Request $request)
    {
        $results = $this->users->safe_update( $user, $request->all() );

        if( $results['error'] )
            return redirect()->back()->withInputs()->withError( $results['messages'][0] );
        else
            return redirect()->route( $this->users->index_route_name )->withSuccess( $this->users->updated_message );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(\User $user)
    {
        if( $user->id == request()->user()->id )
            return redirect()->back()->withInputs()->withError( 'Invalid Operation' );

        $results = $this->users->safe_delete( $user );

        if( $results['error'] )
            return redirect()->back()->withInputs()->withError( $results['messages'][0] );
        else
            return redirect()->route( $this->users->index_route_name )->withSuccess( $this->users->deleted_message );
    }

}