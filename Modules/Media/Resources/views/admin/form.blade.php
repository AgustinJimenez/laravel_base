@extends('templates::admin-lte')

@section('styles')

@endsection

@section('header')
    
    <h1>
        Media
        <small>{{ $media->id?"Edit Form":"Create Form" }}</small>
    </h1>
@endsection


@section('content')
    <div class="box box-primary with-border">
        <div class="box-header">
        </div>

        <div class="box-body">
            @include("media::admin.partials.form.fields")
        </div>
    </div>
@endsection
