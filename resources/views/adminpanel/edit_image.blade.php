
@extends("adminpanel.master")
@section('title')
  Update Image
@endsection
@section('content') 
<div class="row">
 <div class="col-sm-12 col-md-12"> 
        <div class="block-flat">
          <div class="header">              
            <h3>Update Image </h3>
          </div>
          @if(Session::has('success'))
              <p style="color:green">{!!Session::get('success')!!}</p> 
          @endif
          <div class="content">
            {!!Form::open(['url'=>'update_image', 'files'=>true,'class'=>'form-horizontal','parsley-validate novalidate','role'=>'form'])!!}
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Slide Emage </label>
              <div class="col-sm-7">
                <input type="text" name="id" value="{{$image->id}}">
                <img src="<?php echo url('upload/gellary')?>/<?php echo $image->image?>" height="70px" width="70px">
      <input type="file" required parsley-type="email" name="file" value="{{$image->image}}" multiple class="form-control" id="inputEmail3" placeholder="category name">
                @if($errors->has('category_name'))
                  <span style="color:red" class="help-inline">{!!$errors->first('category_name')!!}
                  </span>
                @endif
              </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Update Image</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
             {!!Form::close()!!}
          </div>
        </div>        
      </div>
 </div>
 @endsection