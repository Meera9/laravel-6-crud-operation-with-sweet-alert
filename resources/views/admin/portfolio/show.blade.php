@extends('adminlte::page')

@section('title') {{ $module_name }}  @endsection

@section('content_header')
<h1>{{ $module_name }}</h1>
@stop

@section('content')
<div class="box-header">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="30%">{{$module_name}} Group Name</th>
                                    <td width="130%">{{ $link->group_name}}</td>
                                </tr>
                                <tr>
                                    <th width="30%">{{$module_name}} Name</th>
                                    <td width="130%">{{$link->name}}</td>
                                </tr>
                                <tr>
                                    <th width="30%">{{$module_name}} Link</th>
                                    <td width="130%">{{$link->link}}</td>
                                </tr>
                              </thead>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{ route($route_path.'.index') }}"><button type="button" class="btn btn-sm btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</button></a>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>


        
    </div>
</div>
@endsection