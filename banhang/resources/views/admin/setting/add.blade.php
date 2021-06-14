@extends('admin.layout')
@section('title')
  <title>Tạo Setting</title>
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
             <form action="{{route('settings.created').'?type='.request()->type}}" method="post" >
              @csrf
            <div class="form-group">
              <label  >Config Key</label>
              <input type="text" class="form-control" name="config_key" placeholder="Nhập config key">
            </div>
            @if(request()->type==='Text')
             <div class="form-group">
              <label  >Config Value</label>
              <input type="text" class="form-control" name="config_value" placeholder="Nhập config value">
            </div>            
            @elseif(request()->type==='Textarea')

           <div class="form-group">
              <label  >Config Value</label>
              <textarea name='config_value' class="form-control" rows="5" ></textarea>
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