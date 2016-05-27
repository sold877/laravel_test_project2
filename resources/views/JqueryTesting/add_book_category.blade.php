@extends("JqueryTesting.master")
@section('title')
  Add Category
@endsection
@section('content') 
<div class="row">
 <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="header">              
            <h3>Add Book Category</h3>
          </div>
          @if(Session::has('success'))
              <p style="color:green">{!!Session::get('success')!!}</p>  
          @endif
          <div class="content">
            {!!Form::open(['class'=>'form-horizontal frm','parsley-validate novalidate','role'=>'form'])!!}
              <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Category name </label>
              <div class="col-sm-7">
                <input type="text" id="category_name" required parsley-type="email" name="category_name" class="form-control" id="inputEmail3" placeholder="category name">
                @if($errors->has('category_name'))
                  <span style="color:red" class="help-inline">{!!$errors->first('category_name')!!}
                  </span>
                @endif
              </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-3 control-label">Category Discription</label>
                <div class="col-sm-7">
                  <textarea class="form-control" name="description" id="description" placeholder="Category Discription"></textarea>
                  @if($errors->has('description'))
                  <span style="color:red" class="help-inline">{!!$errors->first('description')!!}</span>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Publication Status</label>
                <div class="col-sm-7">
                  <select name="publication_staus" id="publication_staus" class="form-control">
                      <option value="0">Select Status</option>
                      <option value="1">Published</option>
                      <option value="2">UnPublished</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" id="btnSave" class="btn btn-primary">Save category</button>
                <button class="btn btn-default">Cancel</button>
              </div>
              </div>
            {!!Form::close()!!}
            <a href="#" class="edit" data-val="1">Click me</a>
          </div>
        </div>        
      </div>
 </div> 
 {!!Html::script("userassets/js/jquery.js")!!}
<script type="text/javascript">
//headers: {'X-CSRF-TOKEN': token},
  $(document).ready(function(){
      $(document).on('click','#btnSave',function(){
          var formData=$(".frm").serialize();
          alert(formData);
          var cName=$("#category_name").val();
          var description=$("description").val();
          var  publication_staus=$("publication_staus").val();
          alert("{{URL::to('save')}}");
          $.ajax({
            url:"{{URL::to('save')}}",
            type:"POST",
            data:formData,
            async:false,
            success:function(data){
                alert(data);
            }

          });

      });

      $(document).on('click','.edit',function(){
          var id=$(this).attr('data-val');
          //var url="{{URL::to('take')}}/"+id;
          var url="{{URL::to('take')}}";
          alert(url);
          alert(id);
          $.ajax({
            url:url,
            type:"POST",
            data:{id:id},
            async:false,
            success:function(data){
                alert(data);
            }

          });
      });
          
  });
</script> 
@endsection