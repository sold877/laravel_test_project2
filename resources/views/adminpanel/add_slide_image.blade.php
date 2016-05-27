
@extends("adminpanel.master")
@section('title')
  Add Image
@endsection
@section('content') 
<div class="row">
 <div class="col-sm-12 col-md-12"> 
        <div class="block-flat">
          <div class="header">              
            <h3>Add Image </h3>
          </div>
          @if(Session::has('success'))
              <p style="color:green">{!!Session::get('success')!!}</p> 
          @endif
          <div class="content">
            {!!Form::open(['url'=>'insert_image', 'files'=>true,'class'=>'form-horizontal','parsley-validate novalidate','role'=>'form'])!!}
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Slide Emage </label>
              <div class="col-sm-7">
      <input type="file" required parsley-type="email" name="file[]" multiple class="form-control" id="inputEmail3" placeholder="category name">
                @if($errors->has('category_name'))
                  <span style="color:red" class="help-inline">{!!$errors->first('category_name')!!}
                  </span>
                @endif
              </div>
              </div>
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Save Image</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
             {!!Form::close()!!}
          </div>
        </div>        
      </div>
 </div> 

@if($data)
 <div class="row">
<div class="col-md-12">
          <div class="block-flat">
            <div class="header">              
              <h3>Image List</h3>
            </div>
            <div class="content">
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" >
                  <thead>
                    <tr>
                      <th>Serial No</th>
                      <th>Book Name</th>
                      <th>Action </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $value)
                    <tr class="odd gradeX">
                      <td>{{$value->id}}</td>
                      <td><img src="<?php echo url('upload/gellary')?>/<?php echo $value->image?>" height="70px" width="70px"></td>
                      
              <td class="center">
  <a class="label label-default" href="{{URL::to('edit_image/'.$value->id)}}">
              <i class="fa fa-pencil"></i></a>
  <a class="label label-danger" href="<?php echo url('delete_image');?>/<?php echo $value->id?>">
              <i class="fa fa-times"></i></a>
            <!-- <a class="label label-default" href="{{URL::to('delete_book/'.$value->id)}}"><i class="fa fa-pencil"></i></a> -->
              </td>
                    </tr>
                  @endforeach 
                  </tbody>
                </table>              
              </div>
            </div>
          </div>        
        </div>
 </div> 
 @endif
@endsection