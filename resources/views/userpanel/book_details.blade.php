@extends("userpanel.test")
@section('title')
  Main Content
@endsection
@section('subcontent')
    Book Details
@endsection
@section('content') 

<div class="product-details"><!--product-details--> 
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo url('upload/logo')?>/<?php echo $data->book_image?>">
								<h3>{{$data->book_name}}</h3>
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo url('upload/logo')?>/<?php echo $data->book_image?>">
								<h2>{{$data->book_name}}</h2>
								<p><b>Book Writter:</b>{{$data->book_writter}}</p>
								<p><b>Book publisher:</b> {{$data->book_publisher}}</p>
								<p><b>Quantity:</b> {{$data->book_quantity}}</p>
								<p><b>Book Category:</b> CSC</p>
							</div><!--/product-information-->
						</div>
</div>

@endsection