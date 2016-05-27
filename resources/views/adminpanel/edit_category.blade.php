@extends("adminpanel.master")
@section('title')
  Edit Category
@endsection
@section('content') 
<div class="row">
 <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="header">              
            <h3>Edit Book Category</h3>
          </div>
          @if(Session::has('success'))
              <p style="color:green">{!!Session::get('success')!!}</p>
          @endif
          <div class="content">
            {!!Form::open(['url'=>'update_category','class'=>'form-horizontal','parsley-validate novalidate','role'=>'form'])!!}
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Category name </label>
              <div class="col-sm-7">
              <input type="hidden" name="id" value="{{$data->id}}">
                <input type="text" required parsley-type="email" name="category_name" class="form-control" id="inputEmail3" placeholder="category name" value="@if(!empty($data->category_name)){{$data->category_name}}@endif">
                @if($errors->has('category_name'))
                  <span style="color:red" class="help-inline">{!!$errors->first('category_name')!!}
                  </span>
                @endif
              </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Category Discription</label>
                <div class="col-sm-7">
              <textarea class="form-control" name="description" placeholder="Category Discription">
                  @if(!empty($data->category_name))
                    {{$data->description}}
                  @endif
              </textarea>
                  @if($errors->has('description'))
                  <span style="color:red" class="help-inline">{!!$errors->first('description')!!}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Publication Status</label>
                <div class="col-sm-7">
                  {!!Form::select('publication_staus',['0'=>'Select Status','1'=>'Published','2'=>'UnPublished'],$data->publication_staus,['class'=>'form-control'])!!}
                </div>
              </div>
              
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Update category</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
             {!!Form::close()!!}
          </div>
        </div>        
      </div>
 </div> 
@endsection