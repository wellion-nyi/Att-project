@extends('layouts.app')
@section('title','Index | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class="col-lg-10 justify-content-center">
		{{-- child row --}}
		<div class="row">
			<div class="col-lg-4">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="{{route('store')}}">
						@csrf
						<h2>Borrow</h2>
						<hr>
						{{-- regimental number --}}
						<div class="form-gorup">
							<label>Regimental No:</label>
							<input type="text" name="regimental" placeholder="Regimental Number" class="form-control">
							@error('regimental')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end regimental --}}

						{{-- start rank --}}
						<div class="form-gorup pt-3">
							<label>Rank:</label>
							<input type="text" name="rank" placeholder="Rank"  class="form-control" >
							@error('rank')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end rank --}}


						{{-- start name --}}
						<div class="form-gorup pt-3">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Name" class="form-control" >
							@error('name')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end  name--}}

							{{-- start department--}}
						<div class="form-gorup pt-3">
							<label>Department:</label>
							
												<select name="department" class="form-control" >
													<option disabled selected>-------------</option>
													@foreach($departments as $department)

													<option value="{{$department->id}}"
													 {{($department->id==old('department'))?'selected' : null}}>
													 	{{$department->name}}
													 </option>
													
													@endforeach
												</select>
												@error('department')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end department --}}

						{{-- start end date --}}
						<div class="form-gorup pt-3">
							<label>End date:</label>
							<input type="date" name="date" placeholder="End Date" class="form-control" >
							@error('date')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end end date --}}


					


						{{-- submit --}}
						<div class="pt-4">
							<input type="submit" name="borrow" value="Borrow" class="btn btn-info">
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
			<div class="col-lg-8">
				{{-- card --}}
				<div class="card limittable">
					{{-- card-body --}}
					<div class="card-body">
						
						{{-- table --}}
						<table id="example" class="display nowrap table table-hover "  style="width: 100%">
							{{-- thead --}}
							<thead class="myhead" >
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Author</th>
									<th>Book_Code</th>
									<th>Type of Books</th>
									<th>Check</th>

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
										<a href="{{route('selectbook', $book->id)}}" class="btn btn-success">Select</a>
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
	<div class="col-md-2">
		@if(session('bookname'))
		<ul>
			<?php $books = session()->get('bookname');   $booklist = array_flatten($books); ?>
			<div class="card mybook">
					<div class="card-body">
			@foreach($books as $book)
				@foreach($book as $key=>$mybook)
						
					
								<?php  echo $mybook; ?><a href="{{route('removebook', $key)}}" ><i class="fa fa-times-circle float-right" ></i></a>
								<hr>
						


					
				@endforeach
				
			@endforeach
			</div>
					</div>
		</ul>
		@endif
		
	</div>
	{{-- end second coloum --}}
</div>
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
@endsection()
