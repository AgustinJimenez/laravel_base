@extends('templates::admin-lte-dashboard')

@section('header')
    <h1>
        Roles
        <small>Edit Form</small>
    </h1>
@endsection


@section('content')
    <form action="{{ $role->route_update }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        @include('users::admin.role.partials.role-form')
    </form>
@endsection
