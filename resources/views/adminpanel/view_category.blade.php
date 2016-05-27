@extends("adminpanel.master")
@section('title')
  View Book
@endsection
@section('content')

	<div class="row">
				<div class="col-md-12">
					<div class="block-flat">
						<div class="header">							
							<h3>Category List</h3> 
						</div>
						<div class="content">
							<div class="table-responsive">
								<table class="table table-bordered" id="datatable" >
									<thead>
										<tr>
											<th>Serial No</th>
											<th>Category Name</th>
											<th>Category Description</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@foreach($data as $value)
										<tr class="odd gradeX">
											<td>{{$value->id}}</td>
											<td>{{$value->category_name}}</td>
											<td>{{$value->description}}</td>
											<td class="center">
											@if($value->publication_staus==1)
												{{'Published'}}
											@elseif($value->publication_staus==2)
												{{'UnPublished'}}
											@endif

											</td>

											<td class="center">
				<a class="label label-default" href="{{URL::to('edit/'.$value->id)}}"><i class="fa fa-pencil"></i></a> 
				<a class="label label-danger" href="{{URL::to('delete/'.$value->id)}}"><i class="fa fa-times"></i></a>
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