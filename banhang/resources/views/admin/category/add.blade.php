@extends('admin.layout')
@section('title')
  <title>Tạo danh mục</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Category','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
   
  
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
             <form action="{{route('categories.created')}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Tên danh mục</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
              <label >Chọn danh mục gốc</label>
              <select class="form-control" name="parent_id">
                <option value="0">Danh mục gốc</option>
                {!!$data!!}
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