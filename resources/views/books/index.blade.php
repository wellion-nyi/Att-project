@extends('layouts.app')
@section('title','Books | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
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
					<form method="POST" action="{{route('category_store')}}">
					@csrf
						<h2>Book Create</h2>
						{{-- start book name --}}
						<div class="form-gorup">
							<label> Book Name :</label>
							<input type="text" name="name" placeholder="Book  name" class="form-control">
							@error('name')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end book name --}}

						{{-- start author --}}
						<div class="form-gorup pt-3">
							<label>Author:</label>
							<input type="text" name="author" placeholder="Author" class="form-control">
							@error('author')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end author --}}


						{{-- start book name--}}
						<div class="form-gorup pt-3">
							<label>Book Code:</label>
							<input type="text" name="code" placeholder="Book Code" class="form-control">
							@error('code')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end  book code--}}

						{{-- start type of books --}}
						<div class="form-gorup pt-3">
							<label>Type of Book:</label>
							<select name="category" class="form-control">
													<option disabled selected>-------------</option>
													@foreach($categories as $book_category)

													<option value="{{$book_category->id}}"
													 {{($book_category->id==old('book_category'))?'selected' : null}}>
													 	{{$book_category->name}}
													 </option>
													
													@endforeach
												</select>
												@error('category')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end type of book --}}
						
						

						{{-- submit --}}
						<div class="pt-4">
							<input type="submit"  value="Book Create" class="btn btn-info">
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
			<div class="col-md-8">
				{{-- card --}}
				<div class="card">

					{{-- card-body --}}
					<div class="card-body">
						
					   
						{{-- table --}}
						<table id="example" class="display nowrap table table-hover " style="width: 100%">
							{{-- thead --}}
							<thead class="myhead " >
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Author</th>
									<th>Book_Code</th>
									<th>Type of Books</th>
									<th>Action</th>

								</tr>
							</thead>
							{{-- end thead--}}
							{{-- tbody --}}
							<tbody>
								@foreach($books as $key=>$book)
								<tr>
									<td>{{++$key}}</td>
									<td  class="text-left">{{$book->name}}</td>
									<td  class="text-left">{{$book->author}}</td>
									<td>{{$book->code}}</td>
									<td>{{$book->category['name']}}</td>
							
									<td class="text-center">	
										<a href="{{route('delete',$book->id)}}" onclick="return confirm('Are your sure delete')"><i class="fa fa-trash-o btn btn-danger" aria-hidden="true" ></i> </a> 
										<a href="{{route('totaledit',$book->id)}}"><i class="fa fa-pencil-square btn btn-success" aria-hidden="true"></i></a>
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
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
@endsection()
