@extends('admin.layout')
@section('title')
  <title>Cập nhật User</title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
<link href="{{asset('vendors/adminuser/add/add.css')}}" rel="stylesheet"/>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'User','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
      
           </div>
          <div class="col-md-6">
            <form action="{{route('users.edited',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label  >Tên </label>
              <input type="text" class="form-control" value="{{$user->name}}" name="name" placeholder="Nhập tên ">
            </div>
            <div class="form-group">
              <label  >Email </label>
              <input type="text" class="form-control" value="{{$user->email}}" name="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
              <label  >Password </label>
              <input type="password" class="form-control"  name="password" placeholder="Nhập password">
            </div>
            <div class="form-group">
              <label  >Vai trò </label>
             <select name="role_id[]" class="form-control select2_init" multiple="">
               <option value=""></option>
               @foreach($role as $v)
               <option
                {{$roleuser->contains('id',$v->id)? 'selected' : '' }}
                value="{{$v->id}}"  >{{$v->name}} 
              </option>
               @endforeach
             </select>
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
@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('vendors/adminuser/add/add.js')}}"></script>
@endsection