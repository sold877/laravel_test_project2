@extends("adminpanel.master")
@section('title')
  Add Book
@endsection
@section('content')


<div class="row">
 <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="header">              
            <h3>Add Book</h3>
          </div>
          <div class="content">
          {!!Form::open(['url'=>'update_book', 'files'=>true,'class'=>'form-horizontal','parsley-validate novalidate','role'=>'form'])!!}
            <!-- <form class="form-horizontal" role="form"  parsley-validate novalidate> -->
            <div class="form-group">
                <label class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-7">
                <input type="hidden" name="id" value="{!!$data->id!!}">

                  {!!Form::select('book_category_id',$category,$data->book_category_id,['class'=>'form-control'])!!}
                </div>
              </div>
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Book name </label>
              <div class="col-sm-7"><input type="text" required  name="book_name"
                class="form-control" value="{{ $data->book_name }}"  placeholder="Book name">
                @if($errors->has('book_name'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_name')}}</span>
                @endif
              </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Book Discription</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="book_description" placeholder="Book Description">{{ $data->book_description }}</textarea>
                  @if($errors->has('book_description'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_description')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book Writter</label>
                <div class="col-sm-7">
                   <input type="text" required parsley-type="email" name="book_writter" class="form-control" id="inputEmail3" placeholder="Book Writter" 
                   value="{{ $data->book_writter }}">
                   @if($errors->has('book_writter'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_writter')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book Pdf</label>
                <div class="col-sm-7">
                <input type="file" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Book pdf" name="book_pdf" value="{{ $data->book_pdf }}">
                   @if($errors->has('book_pdf'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_pdf')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book Emage</label>
                <div class="col-sm-7">
                
          <input type="file" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Book image" name="book_image" value="{{ $data->book_image }}">
          <img src="<?php echo url('upload/logo');?>/<?php echo $data->book_image ?>" width="70px" height=70px>
                   @if($errors->has('book_image'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_image')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book Edition</label>
                <div class="col-sm-7">
                  <input type="text" required parsley-type="email" name="book_edition" class="form-control" id="inputEmail3" placeholder="Book Edition" 
                  value="{{ $data->book_edition }}">
                  @if($errors->has('book_edition'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_edition')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book publisher</label>
                <div class="col-sm-7">
                  <input type="text" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Book publisher" name="book_publisher" value="{{ $data->book_publisher }}">
                  @if($errors->has('book_publisher'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_publisher')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Book Quantity</label>
                <div class="col-sm-7">
                  <input type="number" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Book Quantity" name="book_quantity" value="{{ $data->book_quantity }}">
                  @if($errors->has('book_quantity'))
                 <span class="help-inline" style="color: red">{{$errors->first('book_quantity')}}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Publication Status</label>
                <div class="col-sm-7">
                  
                  {!!Form::select('publication_status',['1'=>'Published','0'=>'UnPublished'],$data->publication_status,['class'=>'form-control'])!!}
                  @if($errors->has('publication_status'))
                 <span class="help-inline" style="color: red">{{$errors->first('publication_status')}}</span>
                @endif
                </div>
              </div>
              
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Updete Book</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
              {!!Form::close()!!}
            <!-- </form> -->
          </div>
        </div>        
      </div>
 </div> 
@endsection