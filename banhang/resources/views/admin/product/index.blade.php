
@extends('admin.layout')
@section('title')
  <title>Danh sách sản phẩm</title>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/product/index/list.css')}}">
@endsection

@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Product','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Add</a>
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Giá</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Danh mục</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $v)
                <tr>
                  <th scope="row">{{$v['id']}}</th>
                  <td>{{$v['name']}}</td>
                  <td>{{number_format($v['price'])}}</td>
                  <td>
                    <img  class="product_img_150_100"  src="{{$v['feature_img']}}">
                  </td>
                  <td> {{optional($v->categorys)->name}}</td>
                  <td>
                    <a href="{{route('products.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    <a href="" data-url="{{route('products.delete',['id'=>$v['id']])}}" class="btn btn-danger action_del">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$products->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
<script src="{{asset('vendors/sweetalert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('vendors/product/index/list.js')}}"></script>

@endsection