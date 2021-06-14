@extends('admin.layout')
@section('title')
  <title>Tạo menu</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Menu','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('menus.created')}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Tên menu</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên menu">
            </div>
            <div class="form-group">
              <label >Chọn menu gốc</label>
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