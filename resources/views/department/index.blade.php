@extends('layouts.app')
@section('title', 'Book | Category')
@section('content')
{{-- start container-fluid --}}
<div class="container-fluid">
		{{-- star row --}}
	<div class="row">
			{{-- start col-sm-5 --}}
			<div class="col-md-5">
					{{-- start card --}}
					<div class="card">
							{{-- start card-body --}}
								<div class="card-body">
									<form method="POST" action="{{route('dep_store')}}">
										@csrf
											{{-- form-group--}}
												<div class="form-group mb-5">
												<label>Department:</label>
												<input type="text" name="department" class="form-control" placeholder="Department">
												</div>
											{{-- end form-group --}}
											<input type="submit" name="create" value="Create" class="btn btn-info">
									</form>
								</div>
							{{-- end card-body --}}
					</div>

					{{-- end card --}}
			</div>
			{{-- end col-sm-5 --}}
	</div>
		{{-- end row --}}
</div>
{{-- end container-fluid --}}
@endsection