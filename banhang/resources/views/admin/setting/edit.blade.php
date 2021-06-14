@extends('admin.layout')
@section('title')
  <title>Cập nhật Setting</title>
@endsection
@section('content') 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.content_header',['name'=>'Setting','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
   
  
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-6">
             <form action="{{route('settings.edited',['id'=>$setting->id])}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Config Key</label>
              <input type="text" class="form-control" value="{{$setting->config_key}}" name="config_key" placeholder="Nhập config key">
            </div>
            @if($setting->type=='Text')
             <div class="form-group">
              <label  >Config Value</label>
              <input type="text" class="form-control" value="{{$setting->config_value}}" name="config_value" placeholder="Nhập config value">
            </div>            
            @elseif($setting->type=='Textarea')
           <div class="form-group">
              <label  >Config Value</label>
              <textarea name='config_value' value="{{$setting->config_value}}" class="form-control" rows="5" ></textarea>
            </div>  
           @endif
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