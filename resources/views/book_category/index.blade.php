@extends('layouts.app')
@section('title', 'Book Category | Page')
@section('content')
{{-- start container-fluid --}}

<div class="container-fluid ">

{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class=" col-md-11 justify-content-center">
		{{-- child row --}}

		<div class="row">
			<div class="col-md-4 ">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="{{route('book_store')}}">
					@csrf
						


					{{-- form-group--}}
				<div class="form-group mb-5">
					<label>Book Category:</label>
				<input type="text" name="book_category" class="form-control" placeholder="Book Category here">
			@error('book_category')

									<small style="color: red;">{{$message}}</small>

									@enderror
				</div>
				{{-- end form-group --}}
				<input type="submit" name="create" value="Create" class="btn btn-info">
						

						

						
					</form>
					{{-- end form --}}
					</div>
					{{-- end card-body --}}
				</div>
				{{-- card --}}

				{{-- second card--}}
				<div class="card typescroll mt-5 ">
					{{-- card-body --}}
					<div class="card-body cardbodyscroll ">

					<table class="table">
							{{-- thead --}}
							<thead class="myhead sticky-top" >
								<tr>
								<th>Type of Books</th>
								<th class="text-right" >Action</th>

								</tr>
							</thead>
							{{-- end thead--}}
							{{-- tbody --}}
							<tbody >
								@foreach($categories as $category)
								  <tr>
								  	<td> 
								  		<a href="{{route('book_show',$category->id)}}" >{{$category->name}}</a>
								  	</td>
								  	<td class="text-right">
								  		<a href="{{route('book_delete',$category->id)}}"  onclick="return confirm('Are your sure delete')">
								  			<i class="fa fa-trash-o btn btn-danger " aria-hidden="true" ></i>
								  		</a> &nbsp;&nbsp;
								  		<a href="{{route('book_edit',$category->id)}}">
								  			<i class="fa fa-pencil-square btn btn-success" aria-hidden="true"></i>
								  		</a>
								  	</td>
								  </tr>
								@endforeach
							</tbody>
							{{-- end tbody --}}
							
						</table>
						{{-- end table --}}
						
					</div>
					{{-- end card-body --}}
				</div>
				{{-- end second card --}}
			</div>
			{{-- col-md-7 --}}
			<div class="col-md-8">
				{{-- card --}}
				<div class="card ">
					{{-- card-body --}}
					<div class="card-body">
						
					 
						{{-- table --}}
						<table id="example" class="display nowrap table table-hover"  style="width: 100%">
							{{-- thead --}}
							<thead class="myhead" >
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Author</th>
									<th>Book_Code</th>
									<th>Types of Book</th>
								
									

								</tr>
							</thead>
							{{-- end thead--}}

							{{-- start tbody --}}
							<tbody>
									@foreach($books as $key=>$book)
									<tr>
										<td>{{++$key}}</td>
									<td>{{$book->name}}</td>
									<td>{{$book->author}}</td>
									<td>{{$book->code}}</td>
									<td>{{$book->category->name}}</td>
									
									</tr>
									@endforeach
								
							</tbody>
							{{-- end tbody --}}
							
						</table>
						{{-- end table --}}
					</div>
					{{-- end card-body --}}
				</div>
				{{-- end card --}}
			</div>
			{{-- end col-md-7 --}}
		</div>
		{{-- child row --}}
	</div>
	{{-- end first coloum --}}
	{{-- second coloum --}}
	<div class="col-md-1">
		 
	</div>
	{{-- end second coloum --}}

	





</div>
{{-- end container-fluid --}}

@endsection