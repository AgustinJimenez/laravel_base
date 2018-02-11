@extends('templates::admin-lte-dashboard')

@section('styles')

@endsection

@section('header')
    <h1>
        Users
        <small>Create Form</small>
    </h1>
@endsection


@section('content')

<div class="box box-primary with-border">
    <div class="box-header">
    </div>

    <div class="box-body">
        <form action="{{ route('users.store', [$user->id]) }}" method="POST">
            {{ csrf_field() }}
            @include('users::layouts.form')
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@endsection