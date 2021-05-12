@extends('layouts.app')
@section('title','Index | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
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
					<form method="POST" action="{{route('totalupdate',$books->id)}}">
					@csrf
						<h2>Book Create</h2>
						{{-- start book name --}}
						<div class="form-gorup">
							<label> Book Name :</label>
							<input type="text" name="name" placeholder="Book  name" class="form-control" value="{{$books->name}}">
						</div>
						{{-- end book name --}}

						{{-- start author --}}
						<div class="form-gorup pt-3">
							<label>Author:</label>
							<input type="text" name="author" placeholder="Author" class="form-control" value="{{$books->author}}">
						</div>
						{{-- end author --}}


						{{-- start book name--}}
						<div class="form-gorup pt-3">
							<label>Book Code:</label>
							<input type="text" name="code" placeholder="Book Code" class="form-control" value="{{$books->code}}">
						</div>
						{{-- end  book code--}}

						{{-- start type of books --}}
						<div class="form-gorup pt-3">
							<label>Type of Book:</label>
							<select name="category" class="form-control">
													
													@foreach($book_categories as $book_category)

													<option value="{{$book_category->id}}" {{($book_category->id==$books->category->id)?'selected':null}}>
													 	{{$book_category->name}}
													 </option>
													
													@endforeach
												</select>
						</div>
						{{-- end type of book --}}
						
						

						{{-- submit --}}
						<div class="pt-4">
							<input type="submit"  value="Update" class="btn btn-success">
							<a href="{{route('book_index')}}" class="btn btn-danger">Cencel</a>
						</div>
						{{-- end submit --}}
					</form>
					{{-- end form --}}
					</div>
					{{-- end card-body --}}
				</div>
				{{-- card --}}
			</div>
			{{-- col-md-7 --}}
			
	{{-- second coloum --}}
	<div class="col-md-3">
		<table class="">
			
		</table>
	</div>
	{{-- end second coloum --}}
</div>
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
@endsection()
