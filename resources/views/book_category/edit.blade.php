@extends('layouts.app')
@section('title', 'Category Edit | Page')
@section('content')
{{-- start container-fluid --}}
<div class="container-fluid ">

{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class="col-md-9 justify-content-center">
		{{-- child row --}}
		<div class="row">
			<div class="col-md-4 ">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="{{route('book_update',$categories->id)}}">
					@csrf
						


					{{-- form-group--}}
				<div class="form-group mb-5">
					<label>Book Category:</label>
				<input type="text" name="category" class="form-control" placeholder="Book Category" value="{{$categories->name}}">
				</div>
				{{-- end form-group --}}
				<input type="submit" name="create" value="Update" class="btn btn-success">
					<a href="{{route('category')}}" class="btn btn-danger">Cencel</a>	

						

						
					</form>
					{{-- end form --}}
					</div>
					{{-- end card-body --}}
				</div>
				{{-- card --}}

				
							
							
			</div>
			{{-- col-md-7 --}}
			<div class="col-md-8">
				
						
			</div>
			{{-- end col-md-7 --}}
		</div>
		{{-- child row --}}
	</div>
	{{-- end first coloum --}}
	{{-- second coloum --}}
	<div class="col-md-3">
		
	</div>
	{{-- end second coloum --}}
</div>




</div>
{{-- end container-fluid --}}
@endsection