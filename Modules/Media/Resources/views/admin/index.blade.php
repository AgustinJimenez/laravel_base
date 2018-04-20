@extends('templates::admin-lte-dashboard')

@section('styles')
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
@endsection

@section('header')
    
    <h1>
        Media
        <small>Control Panel</small>
    </h1>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            @include("media::admin.partials.drag-drop")
        </div>
    </div>
    
    <br>

    <div class="box box-primary with-border">

        <div class="box-body">
            @php($columns = ['THUMBNAIL', 'FILE NAME', 'ACTIONS'])
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
