@extends('layouts.app')
@section('title','Edit | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class="col-lg-6 justify-content-center">
		{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="{{route('default_update',$borrowers->id)}}">
						@csrf
						<h2>Borrow</h2>
						{{-- regimental number --}}
						<div class="form-gorup">
							<label>Regimental No:</label>
							<input type="text" name="regimental" placeholder="Regimental Number" class="form-control" value="{{$borrowers->regimental}}">
							
						</div>
						{{-- end regimental --}}

						{{-- start rank --}}
						<div class="form-gorup pt-3">
							<label>Rank:</label>
							<input type="text" name="rank" placeholder="Rank"  class="form-control" value="{{$borrowers->rank}}">
							
						</div>
						{{-- end rank --}}


						{{-- start name --}}
						<div class="form-gorup pt-3">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Name" class="form-control" value="{{$borrowers->name}}">
						
						</div>
						{{-- end  name--}}

							{{-- start department--}}
						<div class="form-gorup pt-3">
							<label>Department:</label>
							
												<select name="department" class="form-control" >
													<option disabled selected>-------------</option>
													@foreach($departments as $department)

													<option value="{{$department->id}}"
													 {{($department->id==$borrowers->department->id)?'selected' : null}}>
													 	{{$department->name}}
													 </option>
													
													@endforeach
												</select>
												@error('department')

									<small style="color: red;">{{$message}}</small>

									@enderror
						</div>
						{{-- end department --}}

						


					


						{{-- submit --}}
						<div class="pt-4">
							<input type="submit"  value="Update" class="btn btn-success">
							<a href="{{route('dep_index')}}" class="btn btn-danger">
								Cencle
							</a>
						</div>
						{{-- end submit --}}
					</form>
					{{-- end form --}}
					</div>
					{{-- end card-body --}}
				</div>
				{{-- card --}}
		</div>
			{{--end first coloum  --}}
			
</div>
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
@endsection()
