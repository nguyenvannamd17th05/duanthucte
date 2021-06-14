@extends('admin.layout')
@section('title')
  <title>Tạo Slider</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Slider','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
           </div>
          <div class="col-md-6">
            <form action="{{route('sliders.created')}}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
              <label  >Tên Slider</label>
              <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập tên slider">
            </div>
            <div class="form-group">
              <label  >Mô tả</label> 
              <textarea class="form-control" name="description" rows="4">{{old('description')}}</textarea>
              
            </div>
           <div class="form-group">
              <label  >Hình ảnh</label>
              <input type="file" class="form-control-file" name="img_path" >
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