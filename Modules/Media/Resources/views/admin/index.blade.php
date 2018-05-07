@extends('templates::admin-lte')

@section('styles')
    
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
    <script type="text/javascript"> 
       
        app.set_datatable
        (
            '{!! route('admin.media.index_ajax') !!}',
            [
                { data: 'thumbnail', name: 'thumbnail', orderable: true, searchable: false},
                { data: 'filename', name: 'filename', orderable: true, searchable: false},
                { data: 'actions', name: 'actions', orderable: false, searchable: false}
            ] 
        );
        app.set_dropzone();

    </script>
@endsection

@section("scripts")
    
@endsection