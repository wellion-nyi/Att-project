<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\Book_category;
use Auth;
use App\Borrower;
use App\Book;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::orderby('name','ASC')->get();
        $borrowers=Borrower::all();
        $books=Book::all();
         $categories=Book_category::all();
       return view('department.index',compact('categories','departments','borrowers','books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'department'=>'required|string',
        ]);
         $department=$request->department;
        $departments= new Department;
        $departments->name=$department;
        $departments->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $departments=Department::all();
       $borrowers=Borrower::where('dep_id','=',$id)->get();
       $books=Book::all();
       return view('department.index',compact('borrowers','books','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $departments=Department::findOrFail($id);
        return view('department.edit',compact('departments'));
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
        'department'=>'required|string',
    ]);
        
    $department=$request->department;
    $departments=Department::findOrFail($id);
    $departments->name=$department;
    $departments->save();
    return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           if (Department::where('id', $id)->delete()) {
            return redirect()->back();
        }else{
             return redirect()->back();
        }
    }


         public function filter(Request $request){
       
        $date=$request->date;
       
        $splitdate = explode('-', $date); // 12/22
        if($request->datecheck=='day'){
            $borrowers=Borrower::whereDate('end_at', $date)->get();
            $date=$date;
        }elseif($request->datecheck=='month'){
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
       
        $departments=Department::all();
        return view('department.index', compact('borrowers', 'date','departments'));
}
       
 





}
