@extends('admin.layout')
@section('title')
  <title>Cập nhật danh mục</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Category','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('categories.edited',['id'=>$category->id])}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Tên danh mục</label>
              <input type="text" class="form-control" value="{{$category->name}}" name="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
              <label >Chọn danh mục gốc</label>
              <select class="form-control" name="parent_id">
                <option value="0">Danh mục gốc</option>
                {!!$htmlOption!!}
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