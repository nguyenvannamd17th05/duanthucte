
@extends('admin.layout')
@section('title')
  <title>Danh sách danh mục</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('admin.content_header',['name'=>'Category','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @can('category-add')
            <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
            @endcan
          </div>
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tên danh mục</th>
                 
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($category as $v)
                <tr>
                  <th scope="row">{{$v['id']}}</th>
                  <td>{{$v['name']}}</td>
                  <td>
                    @can('category-edit')
                    <a href="{{route('categories.edit',['id'=>$v['id']])}}" class="btn btn-default">Edit</a>
                    @endcan
                    @can('category-delete')
                    <a href="{{route('categories.delete',['id'=>$v['id']])}}" class="btn btn-danger">Delete</a>
                    @endcan
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-md-12" >
            
              {{$category->links()}}
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection