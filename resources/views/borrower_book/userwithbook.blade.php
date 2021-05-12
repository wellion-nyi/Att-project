
@extends('layouts.app')
@section('title','Borrower | Page')
@section('content')
{{-- container -fluid--}}
<div class="container-fluid">
{{-- start row --}}
<div class="row">
  {{-- start col-md-9 coloum --}}
  <div class="col-md-10 justify-content-center">
        {{-- card --}}
        <div class="card">
          {{-- card-body --}}
          <div class="card-body">
            
            <div>
              <h3 class="text-success font-weight-bold">Borrowers</h3>
              <hr>
            </div>
  <!-- start table -->
    <table id="example" class="display nowrap table table-hover " style="width: 100%">
        <thead class="mycontainer">
            <tr >
              <th>No</th>
               <th> Regimental No</th>
                <th>Rank</th>
                <th>Name</th>
                <th>Book Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Department</th>
                <th>Action</th>
                <th>Check</th>
            </tr>
        </thead>
        <tbody>







            @foreach($borrowers as $key=>$borrower)
            <tr>
              <td>{{++$key}}</td>
                <td>{{$borrower->regimental}}</td>
                <td>{{$borrower->rank}}</td>
                <td>{{$borrower->name}}</td>
                 <td>
               @foreach($borrower->books()->wherePivot('status', 1)->get() as $book)
                 {{$book->name}}<br>
               @endforeach 

              </td>
                <td>{{\Carbon\Carbon::parse($borrower->created_at)->format('d/M/y')}}
                 </td>
                 <td>{{\Carbon\Carbon::parse($borrower->end_at)->format('d/M/y')}}</td>
                
                <td>{{$borrower->department->name}}</td>
              <td class="">
                <a href="{{route('showborbook',$borrower->id)}}" class="mr-2">
                        <i class="fa fa-eye btn btn-info" aria-hidden="true"></i>
                      </a>
                      <a href="{{route('borrower_delete',$borrower->id)}}"  onclick="return confirm('Are your sure delete')">
                        <i class="fa fa-trash-o btn btn-danger " aria-hidden="true" ></i>
                      </a> &nbsp;
                      <a href="{{route('bor_edit',$borrower->id)}}">
                        <i class="fa fa-pencil-square btn btn-success" aria-hidden="true"></i>
                      </a>
                    </td>
                <td class="text-center">‌
                 <a href="" class="btn btn-success ">check</a>
               </td>
            </tr>
            @endforeach
          
        </tbody>
    </table>
  <!-- end table -->

          </div>
          {{-- end card-body --}}
        </div>
        {{-- end card --}}
      
  </div>
  {{-- end first coloum --}}
  {{-- second coloum --}}
  <div class="col-md-2">
    {{-- card --}}
      <div class="card">
        <div class="card-body">
          {{-- start form --}}
          <form method="get" action="{{route('filter')}}">
            @csrf
            <label>Date:</label>
            <input type="date" name="date" class="form-control">

           <div>
              <input type="radio" name="radio" class="mt-3" value="day"  ><span class="ml-2">day</span>  
           </div>

            <div>
              <input type="radio" name="radio" class="mt-3" value="month"><span class="ml-2">month</span>
            </div>

            <div>                  
              <input type="radio" name="radio" class="mt-3" value="year"><span class="ml-2">year</span>  
              </div>

              <div class="float-right">
                <input type="submit" name="filter" value="filter" class="btn btn-success">
              </div>
          
                           
          </form>
          {{-- end form --}}
        </div>
        {{-- end card-body --}}
    </div>

    {{-- end card--}}
  </div>
  {{-- end second coloum --}}
</div>
{{-- end row --}}
</div>
{{-- end conatainer-fluid --}}
 
@endsection()
