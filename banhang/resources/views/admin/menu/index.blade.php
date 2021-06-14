
@extends('admin.layout')
@section('title')
  <title>Danh sách menu</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Menu','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên Menu</th>
                 
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $v)
                <tr>
                  <th scope="row">{{$v['id']}}</th>
                  <td>{{$v['name']}}</td>
                  <td>
                    <a href="{{route('menus.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    <a href="{{route('menus.delete',['id'=>$v['id']])}}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$data->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection