@extends("adminpanel.master")
@section('title')
  View Book
@endsection
@section('content')
	<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Book List</h3>
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Serial No</th>
											<th>Book Name</th>
											<th>Book Discription</th>
											<th>Category</th>
											<th>Writter</th>
											<th>Edition</th>
											<th>Publisher</th>
											<th>Quantity </th>
											<th>Pdf & Image </th>
											<th>Status</th>
											<th>Action </th>
										</tr>
									</thead>
									<tbody>
									@foreach($data as $value)
										<tr class="odd gradeX">
											<td>{{$value->id}}</td>
											<td>{{$value->book_name}}</td>
											<td>{{$value->book_description}}</td>
											<td class="center">
											@foreach($category as $val)
												@if($val->id == $value->book_category_id)
													{{$val->category_name}}
												@endif
											@endforeach
											</td>
											<td class="center">{{$value->book_writter}}</td> 
											<td class="center">{{$value->book_edition}}</td>
											<td class="center">{{$value->book_publisher}}</td>
											<td class="center">{{$value->book_quantity}}</td> 
											<td class="center">
											<img src="<?php echo url('upload/logo')?>/<?php echo $value->book_image?>" width="70px" height="70px">
											</td>
											<td class="center">
												@if($value->publication_status==1)
													{{'published'}}
												@elseif($value->publication_status==2)
													{{'un-published'}}
												@endif
											</td>
							<td class="center">
	<a class="label label-default" href="{{URL::to('edit_book/'.$value->id)}}">
							<i class="fa fa-pencil"></i></a>
	<a class="label label-danger" href="<?php echo url('delete_book');?>/<?php echo $value->id?>">
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
@endsection