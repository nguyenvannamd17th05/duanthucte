
@extends('admin.layout')
@section('title')
  <title>Danh sách nhân viên</title>
@endsection

@section('css')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/slider/index/list.css')}}">
 --}}@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'User','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên </th>
                   <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $v)
                <tr>
                  <th scope="row">{{$v->id}}</th>
                  <td>{{$v->name}}</td>
                  <td>{{$v->email}}</td>
                 
                  <td>
                    <a href="{{route('users.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{route('users.delete',['id'=>$v['id']])}}" class="btn btn-danger action_del">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$user->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('vendors/slider/index/list.js')}}"></script>
<script src="{{asset('vendors/delete.js')}}"></script>
@endsection