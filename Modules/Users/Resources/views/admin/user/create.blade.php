@extends('templates::admin-lte-dashboard')

@section('header')
    <h1>
        Users
        <small>Create Form</small>
    </h1>
@endsection


@section('content')
    <form action="{{ $user->route_store }}" method="POST">
        {{ csrf_field() }}
        @include('users::admin.user.layouts.user-form')
    </form>
@endsection