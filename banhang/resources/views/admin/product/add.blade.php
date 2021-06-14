@extends('admin.layout')
@section('title')
  <title>Tạo sản phẩm</title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
<link href="{{asset('vendors/product/add/add.css')}}" rel="stylesheet"/>
@endsection

@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Product','key'=>'Add'])
    <!-- /.content-header -->
   
    <!-- Main content -->
     <form action="{{route('products.created')}}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
           
              @csrf
            <div class="form-group">
              <label  >Tên sản phẩm</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
              @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
             <div class="form-group">
              <label  >Giá sản phẩm</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập giá sản phẩm" value="{{old('price')}}">
               @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
           
            <div class="form-group">
              <label  >Ảnh sản phẩm</label>
              <input type="file" class="form-control-file" name="img" >
            </div>
             <div class="form-group">
              <label  >Ảnh chi tiết</label>
              <input type="file" class="form-control-file" multiple="multiple" name="img_path[]" >
            </div>
            <div class="form-group">
              <label >Chọn danh mục </label>
              <select class="form-control select2_cate @error('cate_id') is-invalid @enderror" name="cate_id">
                <option value="">Danh mục gốc</option>
                {!!$data!!}
              </select>
              @error('cate_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>
            
            <div class="form-group">
              <label >Nhập tags cho sản phẩm</label>
                <select name="tags[]" class="form-control tags_select" multiple="multiple">
                 
                </select>
            </div>
          
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label  >Nhập content</label>
              <textarea name="content" class="form-control editor5 @error('content') is-invalid @enderror " rows="12">
                {{old('content')}}
              </textarea>
                            @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

            </div>
          </div>
          <div class="col-md-12"><button type="submit" class="btn btn-primary">Submit</button></div>
        </div>
    
      </div>
    </div>
 </form>
  </div>
@endsection

@section('js')
<script src="{{asset('vendors/tinymce/tinymce.min.js')}}" referrerpolicy="origin"></script>
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('vendors/product/add/add.js')}}"></script>
@endsection