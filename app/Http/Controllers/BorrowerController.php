<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Borrower;
use DB;
use Session;
use App\Book;
use App\Department;   
use App\Book_borrower;
class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $borrowers=Borrower::orderby('id','DESC')->get();
     
        $books=Book::all();
        return view('borrower.index' ,compact('borrowers','books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::all();
       $borrowers=Borrower::findOrFail($id);
       return view('borrower.edit',compact('departments','borrowers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
          'regimental'=>'required',
          'rank'=>'required',
          'name'=>'required',
           'department'=> 'required',
           'date'=>'required',
        ]);
        $regimental=$request->regimental;
        $rank=$request->rank;
        $name=$request->name;
        $date=$request->date;
        $department_id=$request->department;
        $borrowers=Borrower::findOrFail($id);
        $borrowers->regimental=$regimental;
         $borrowers->rank=$rank;
          $borrowers->name=$name;
           $borrowers->dep_id=$department_id;
           $borrowers->end_at=$date;
           $borrowers->save();
           return redirect('/borrower');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if (Borrower::where('id', $id)->delete()) {
            return redirect()->back();
        }else{
             return redirect()->back();
        }
    }
   
 
//filter
    public function filter(Request $request){
       
        $date=$request->date;
       
        $splitdate = explode('-', $date); // 12/22
        if($request->radio=='day'){
            $borrowers=Borrower::whereDate('end_at', $date)->get();
            $date=$date;
        }elseif($request->radio=='month'){
            $month =$splitdate[1];
            $year=$splitdate[0];
            $borrowers=Borrower::whereMonth('end_at', $month)->whereYear('date', $year)->get();
            $date=$year.'-'.$month;
        }else{
            $year=$splitdate[0];
            $borrowers=Borrower::whereYear('end_at', $year)->get();
            $date=$year;
        }
        //for more
       
        
        return view('borrower.index', compact('borrowers', 'date'));
    }





}