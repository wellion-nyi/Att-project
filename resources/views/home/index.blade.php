@extends('layouts.app')
@section('title','Index | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class="col-md-8 justify-content-center">
		{{-- child row --}}
		<div class="row">
			<div class="col-md-5 ">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="">
						<h2>Borrow</h2>
						{{-- regimental number --}}
						<div class="form-gorup">
							<label>Regimental No:</label>
							<input type="text" name="regimental" placeholder="Regimental Number" class="form-control">
						</div>
						{{-- end regimental --}}

						{{-- start rank --}}
						<div class="form-gorup pt-4">
							<label>Rank:</label>
							<input type="text" name="rank" placeholder="Rank" class="form-control">
						</div>
						{{-- end rank --}}


						{{-- start name --}}
						<div class="form-gorup pt-4">
							<label>Name:</label>
							<input type="text" name="name" placeholder="Name" class="form-control">
						</div>
						{{-- end  name--}}

						{{-- start book name --}}
						<div class="form-gorup pt-4">
							<label>Book Name:</label>
							<input type="text" name="book_name" placeholder="Book Name" class="form-control">
						</div>
						{{-- end book name --}}

						{{-- start author--}}
						<div class="form-gorup pt-4">
							<label>Author:</label>
							<input type="text" name="author" placeholder="Author" class="form-control">
						</div>
						{{-- end author --}}

						{{-- start book code --}}
						<div class="form-gorup pt-4">
							<label>Book Code:</label>
							<input type="text" name="book_code" placeholder="Book Code" class="form-control">
						</div>
						{{-- end book code --}}

						{{-- start department--}}
						<div class="form-gorup pt-4">
							<label>Department:</label>
							<select name="department" class="form-control">
								<option>
									
								</option>
							</select>
						</div>
						{{-- end book code --}}


						{{-- submit --}}
						<div class="pt-5">
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
			<div class="col-md-7">
				
			</div>
		</div>
		{{-- child row --}}
	</div>
	{{-- end first coloum --}}
	{{-- second coloum --}}
	<div class="col-md-4">
		<table class="">
			
		</table>
	</div>
	{{-- end second coloum --}}
</div>
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
@endsection()
