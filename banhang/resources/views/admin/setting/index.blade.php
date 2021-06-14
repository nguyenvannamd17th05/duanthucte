
@extends('admin.layout')
@section('title')
  <title>Danh sách setting</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/setting/index/list.css')}}">
@endsection
@section('content') 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Setting','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="btn-group float-righ">
              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                Add Setting
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                <li><a href="{{route('settings.create').'?type=Textarea'}}">Textarea</a></li>
              </ul>
            </div>
           
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Config Key</th>
                  <th scope="col">Config Value</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($setting as $v)
                <tr>
                  <th scope="row">{{$v->id}}</th>
                  <td>{{$v->config_key}}</td>
                  <td>{{$v->config_value}}</td>
                  <td>
                    <a href="{{route('settings.edit',['id'=>$v->id])}}" class="btn btn-default">Edit</a>
                    <a href="" class="btn btn-danger action_del" data-url="{{route('settings.delete',['id'=>$v->id])}}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$setting->links()}}
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