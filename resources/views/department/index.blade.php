@extends('layouts.app')
@section('title', 'Department | page')
@section('content')
{{-- start container-fluid --}}
<div class="container-fluid ">

{{-- start row --}}
<div class="row">
	{{-- start first coloum --}}
	<div class="col-md-10 justify-content-center">
		{{-- child row --}}
		<div class="row">
			<div class="col-lg-4 ">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					{{-- form --}}
					<form method="POST" action="{{route('dep_store')}}">
					@csrf
						


					{{-- form-group--}}
				<div class="form-group mb-5">
					<label>Department:</label>
				<input type="text" name="department" class="form-control" placeholder="Department here">
				@error('department')

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
								<th>Department</th>
								<th>Count</th>
								<th class="text-right" >Action</th>

								</tr>
							</thead>
							{{-- end thead--}}
							{{-- tbody --}}
							<tbody >
								@foreach($departments as $department)
								  <tr>
								  	<td> 
								  		<a href="{{route('depart_show',$department->id)}}" >{{$department->name}}</a>
								  	</td>
								  	<td>{{$borrowers->books()->where('status','=',0)->count()}}</td>
								  	<td class="text-right">
								  		<a href="{{route('dep_delete',$department->id)}}"   onclick="return confirm('Are your sure delete')">
								  			<i class="fa fa-trash-o btn btn-danger" aria-hidden="true" ></i>
								  		</a> &nbsp;&nbsp;
								  		<a href="{{route('dep_edit',$department->id)}}">
								  			<i class="fa fa-pencil-square btn btn-success" aria-hidden="true"></i>
								  				
								  			
								  		</a>
								  	</td>
								  
								  		
								  	</div>
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
			<div class="col-lg-8">
				{{-- card --}}
				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
					
						{{-- table --}}
						<table id="example" class="display nowrap table table-hover " style="width: 100%" >
							{{-- thead --}}
							<thead class="myhead" >
								<tr>
									<th>No</th>
									<th>Regimental</th>
									<th>Rank</th>
									<th>Name</th>
									<th>Book name</th>
									<th>Department</th>
									<th>Action</th>
									

								</tr>
							</thead>
							{{-- end thead--}}
							{{-- start tbody --}}
							<tbody>
								@foreach($borrowers as $key=>$borrower)
								<tr>
									<td>{{++$key}}</td>
									<td>{{$borrower->regimental}}</td>
									<td>{{$borrower->rank}}</td>
									<td>{{$borrower->name}}</td>
									<td>
									@foreach($borrower->books as $book)
									
										{{$book->name}} <br>

									@endforeach
										</td>
									
									
									
								
									<td>{{$borrower->department->name}}</td>
									<td class="text-right">
										<a href="{{route('default_delete',$borrower->id)}}"   onclick="return confirm('Are your sure delete')">
										<i class="fa fa-trash-o btn btn-danger" aria-hidden="true" ></i>
										</a> &nbsp;&nbsp;
										<a href="{{route('default_edit',$borrower->id)}}">
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
				{{-- end card --}}
			</div>
			{{-- end col-md-7 --}}
		</div>
		{{-- child row --}}
	</div>
	{{-- end first coloum --}}

	{{-- second coloum --}}
	<div class="col-md-2">
		 {{-- card --}}
      <div class="card">
        <div class="card-body">
          <form method="get" action="{{route('dep_filter')}}">
            <label>Date:</label>
            <input type="date" name="date" class="form-control">
           <div>
              <input type="radio" name="radio" class="mt-3" value="day"><span class="ml-2">day</span>  
           </div>
            <div>
              <input type="radio" name="radio" class="mt-3"value="month"><span class="ml-2">month</span>
            </div>
            <div>
              <input type="radio" name="radio" class="mt-3"value="year"><span class="ml-2">year</span>  
            </div>    
            <div class="float-right">
                <input type="submit" name="filter" value="filter" class="btn btn-success">
              </div>                      
          </form>
        </div>
    </div>

    {{-- end card--}}
	</div>
	{{-- end second coloum --}}
</div>




</div>
{{-- end container-fluid --}}
@endsection