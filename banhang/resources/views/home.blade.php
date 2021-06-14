@extends('admin.layout')
@section('title')
  <title> Trang chu</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Home','key'=>'Home'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            Hello
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

