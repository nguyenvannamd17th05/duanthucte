
@extends('admin.layout')
@section('title')
  <title>Danh sách Slider</title>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/slider/index/list.css')}}">
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Slider','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên Slider</th>
                   <th scope="col">Description</th>
                  <th scope="col">Hình ảnh</th>
                </tr>
              </thead>
              <tbody>
                @foreach($slider as $v)
                <tr>
                  <th scope="row">{{$v->id}}</th>
                  <td>{{$v->name}}</td>
                  <td>{{$v->description}}</td>
                  <td>
                    <img class="imgslider_150_100" src="{{$v->img_path}}">
                  </td>
                  <td>
                    <a href="{{route('sliders.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{route('sliders.delete',['id'=>$v['id']])}}" class="btn btn-danger action_del">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$slider->links()}}
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

@endsection