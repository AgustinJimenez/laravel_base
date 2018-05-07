@extends('templates::admin-lte')

@section('header')
    <h1>
        User
        <small>Edit Form</small>
    </h1>
@endsection


@section('content')
    <form action="{{ $user->route_update }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        @include('users::admin.user.layouts.user-form')
    </form>
@endsection
