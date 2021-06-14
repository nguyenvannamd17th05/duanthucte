@extends('admin.layout')
@section('title')
  <title>Tạo Role</title>
@endsection
@section('css')
 <link rel="stylesheet" type="text/css" href="{{asset('vendors/role/add/add.css')}}">
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Role','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <form action="{{route('roles.created')}}" method="post" enctype="multipart/form-data" style="width: 100%;">
          <div class="col-md-12">
            
              @csrf
            <div class="form-group">
              <label  >Tên Vai trò</label>
              <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập tên vai trò">
            </div>
            <div class="form-group">
              <label  >Mô tả vai trò</label> 
              <textarea class="form-control" name="display_name" rows="4">{{old('dispaly_name')}}</textarea>
              
            </div>
          
           
           
            
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label>
                  <input type="checkbox" class="checkall" > Check all
                </label>
               </div>
              @foreach($permission as $v)
              <div class="card border-primary mb-3 col-md-12" >
                <div class="card-header ">
                  <label ><input type="checkbox" value="" class="checkbox_parent" name=""></label>
                   Module {{$v->name}}
                </div>
                <div class="row">
                  @foreach($v->permissionChild as $v_child)
                  <div class="card-body text-primary col-md-3">
                    <h5 class="card-title">
                    <label><input type="checkbox" class="checkbox_child" value="{{$v_child->id}}" name="permission_id[]"></label>
                    {{$v_child->name}}
                    </h5>
                  </div>
                  @endforeach
                </div>
              </div>

              @endforeach
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    
      </div>
    </div>
 
  </div>
@endsection
@section('js')
<script src="{{asset('vendors/role/add/add.js')}}"></script>
@endsection