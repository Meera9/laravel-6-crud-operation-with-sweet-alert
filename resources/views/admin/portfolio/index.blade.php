@extends('adminlte::page')

@section('title') {{ $title }}  @endsection

@section('content_header')
<h1>{{ $title }}</h1>
<a href="{{ route($route."create") }}" type="submit" class="btn btn-success pull-right">Add {{$title}}</a>
<br/>
<br/>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">

        <div class="box">
        <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description
                        <th width="280px">Action</th>
                      </tr>
                    </tfoot>

                </table>
              </div>
            <!-- /.box-header -->

            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </div>
</div>

@endsection
@section('js')
<!-- DataTables -->
<script type='text/javascript'>

$(function() {
  $('#example1').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: "{!! route($route."ajaxData")   !!}",

      columns: [
          {data: 'id', name: 'id' },
          {data: 'name', name: 'name' },
          { data: 'image', name: 'image',
            render: function( data, type, full, meta ) {
              return "<img src=\"{{url(asset('public/uploads/portfolio'))}}/" + data + "\" height=\"50\"/>";
            }
          },
          {data: 'description', name: 'description' },
          {data: 'action', name: 'action', searchable: false, orderable : false,className : 'text-center'},
      ]
  });
});

function deleteUser(url) {
  if(confirm("Do you really want to delete this {{$title}} ?"))
    window.location.href= url;
  else
    return false;
}
</script>
@endsection
