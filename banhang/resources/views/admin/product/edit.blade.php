@extends('admin.layout')
@section('title')
  <title>Cập nhật sản phẩm</title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet"/>
<link href="{{asset('vendors/product/add/add.css')}}" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/product/edit/edit.css')}}">
@endsection

@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Product','key'=>'Edit'])
    <!-- /.content-header -->

    <!-- Main content -->
     <form action="{{route('products.edited',['id'=>$data['id']])}}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
           
              @csrf
            <div class="form-group">
              <label  >Tên sản phẩm</label>
              <input type="text" value="{{$data->name}}" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
            </div>
             <div class="form-group">
              <label  >Giá sản phẩm</label>
              <input type="text" value="{{$data->price}}" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="form-group contain_img_feature" >
              <label  >Ảnh sản phẩm</label>
              <input type="file" class="form-control-file" name="img" >
              <div class="col-md-4">
                <div class="row">
                  <img class="img_feature" src="{{$data->feature_img}}">
                </div>
              </div>
            </div>
             <div class="form-group">
              <label  >Ảnh chi tiết</label>
              <input type="file" class="form-control-file" multiple="multiple" name="img_path[]" >
              <div class="col-md-12 container_imgdetail">
                <div class="row">
                  @foreach($data->productimages as $v)
                  <div class="col-md-3"><img class="img_detail" src="{{$v->img}}"></div>
                  @endforeach
                </div>

              </div>
            </div>
            <div class="form-group">
              <label >Chọn danh mục </label>
              <select class="form-control select2_cate" name="cate_id">
                <option value="">Danh mục gốc</option>
                {!!$htmlOption!!}
              </select>
            </div>
            
            <div class="form-group">
              <label >Nhập tags cho sản phẩm</label>
                <select name="tags[]" class="form-control tags_select" multiple="multiple">
                  @foreach($data->tags as $v)
                  <option value="{{$v->name}}" selected>{{$v->name}} </option>
                  @endforeach
                </select>
            </div>
          
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label  >Nhập content</label>
              <textarea name="content" class="form-control editor5" rows="12">{{$data->content}}</textarea>
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