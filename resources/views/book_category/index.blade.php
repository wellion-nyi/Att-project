@extends('layouts.app')
@section('title', 'Book | Category')
@section('content')
{{-- start container-fluid --}}
<div class="container-fluid mycontainer">

	{{-- jumbotron --}}
	<div class="myjumbotron ">
		<h2 class="mb-5">Types of Book-</h2>
		{{-- card --}}
	<div class="card ">
		{{-- card-body --}}
		<div class="card-body">
			{{-- form --}}
			<form method="POST" action="{{route('book_store')}}">
				@csrf
				{{-- form-group--}}
				<div class="form-group mb-5">
					<label>Book Category:</label>
				<input type="text" name="book_category" class="form-control" placeholder="Book Category">
				</div>
				{{-- end form-group --}}
				<input type="submit" name="create" value="Create" class="btn btn-info">
			</form>
			{{-- end form --}}
		</div>
		{{-- end card-body --}}
	</div>
	{{-- ende card --}}
	</div>
	{{-- end jumbotron --}}
</div>
{{-- end container-fluid --}}
@endsection