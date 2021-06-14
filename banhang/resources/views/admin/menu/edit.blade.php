@extends('admin.layout')
@section('title')
  <title>Cập nhật menu</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Menu','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('menus.edited',['id'=>$data->id])}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Tên Menu</label>
              <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
              <label >Chọn Menu gốc</label>
              <select class="form-control" name="parent_id">
                <option value="0">Menu gốc</option>
                {!!$html!!}
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