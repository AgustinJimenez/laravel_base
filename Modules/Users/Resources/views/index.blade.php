@extends('templates::admin-lte-dashboard')

@section('styles')

@endsection

@section('header')
    <h1>
        Users
        <small>Control panel</small>
    </h1>
@endsection


@section('content')
    
    <div class="box box-primary with-border">
        <div class="box-header">
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">NEW USER</a>
            </div>
        </div>

        <div class="box-body">
            @php($columns = ['NAME', 'EMAIL', 'ACTIONS'])
            <div class="table-responsive">
                <table class="data-table table table-bordered table-hover">
                    <thead>
                        <tr>
                            @foreach ($columns as $column )
                                <td class="bg-primary text-center">{{ $column }}</td>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if( isset($users) )
                            @foreach ($users as $user)
                                <tr>
                                    
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', [$user->id]) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', [$user->id]) }}">
                                            {{ $user->email }}
                                        </a>
                                    </td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>

                                            <button href="{{ route('users.destroy', [$user->id]) }}" onClick="open_generic_modal( $(this), 'delete', 'CONFIRMACION', 'DESEA ELIMINAR ESTE REGISTRO?' )" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                        
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            @foreach ($columns as $column )
                                <td class="bg-primary text-center">{{ $column }}</td>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
@endsection