@extends('templates::admin-lte')

@section('header')
    <h1>
        Roles
        <small>Create Form</small>
    </h1>
@endsection


@section('content')
    <form action="{{ $role->route_store }}" method="POST">
        {{ csrf_field() }}
        @include('users::admin.role.partials.role-form')
    </form>
@endsection
