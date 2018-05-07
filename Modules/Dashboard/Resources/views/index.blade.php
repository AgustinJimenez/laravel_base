@extends('templates::admin-lte')

@section('styles')

@endsection

@section('header')
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
@endsection

@section('content')
    
    <div class="row">

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title text-center">SERVER INFO</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        @foreach( $server_datas as $key => $data )
                            <li class="item">
                                <div class="product-info">
                                    <span class="text-primary"> 
                                        {{ str_replace('_', ' ', $key) }}
                                    </span>
                                    <span class="product-description">
                                        {{ $data }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!--
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">INFO</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
        -->

    </div>
@endsection

@section('scripts')

@endsection

