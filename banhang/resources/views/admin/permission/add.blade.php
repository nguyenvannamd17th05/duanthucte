@extends('admin.layout')
@section('title')
  <title>Tạo Permission</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Permisson','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form action="{{route('permissions.created')}}" method="post" >
              @csrf
            
            <div class="form-group">
              <label >Chọn module</label>
              <select class="form-control" name="module">
                <option value="">Chọn module</option>
                @foreach(config('permissions.module') as $module )
                <option value="{{$module}}">{{$module}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <div class="row">
                @foreach(config('permissions.module_action') as $module_action)
                <div class="col-md-3">
                  <label>
                    <input type="checkbox" value="{{$module_action}}" name="module_action[]" > {{$module_action}}
                  </label>
                </div>
                @endforeach
              </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection