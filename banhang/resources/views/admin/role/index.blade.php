
@extends('admin.layout')
@section('title')
  <title>Danh sách Vai trò (Role)</title>
@endsection


@section('content') 
  
  <div class="content-wrapper">
   
   @include('admin.content_header',['name'=>'Role','key'=>'List'])
 
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên vai trò </th>
                   <th scope="col">Mô tả</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($role as $v)
                <tr>
                  <th scope="row">{{$v->id}}</th>
                  <td>{{$v->name}}</td>
                  <td>{{$v->display_name}}</td>
                 
                  <td>
                    <a href="{{route('roles.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{route('roles.delete',['id'=>$v['id']])}}" class="btn btn-danger action_del">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$role->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>

<script src="{{asset('vendors/delete.js')}}"></script>
@endsection