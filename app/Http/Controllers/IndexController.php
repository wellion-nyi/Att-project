<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book_category;
use App\Department;
use App\Borrower;
use App\Book;
use Session;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $departments=Department::all();
          $borrowers=Borrower::all();
          $categories=Book_category::all();
         $books=Book::where('status', 1)->orderBy('id', 'ASC')->get();


       
       return view('home.index',compact('categories','departments','books','borrowers'));
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
        $request->validate([
                  'regimental'=>'required|min:2|max:30|string',
                  'rank'=>'required|min:2|max:200|string',
                    'name'=>'required|min:2|max:200|string',
                      'date'=>'required|min:2|max:200|string',
                      'department'=> 'required',

        ]);
        $regimental=$request->regimental;
        $rank=$request->rank;
        $name=$request->name;
        $date=$request->date;
        $department_id=$request->department;
        $borrower=new Borrower;
        $borrower->regimental=$regimental;
        $borrower->rank=$rank;
        $borrower->name=$name;
        $borrower->end_at=$date;
        $borrower->dep_id=$department_id;
        $borrower->save();
        $borrowerid=$borrower->id;
        $books = session()->get('bookname');   
        //$booklist = array_flatten($books);
        foreach($books as $book){
            foreach($book as $key=>$mybook){
                $book=Book::find($key);
                $book->status=0;
                $book->save();
                DB::table('book_borrower')
              ->insert(["book_id"=>$key, "borrower_id"=>$borrowerid]);
              }
          
        }

        session()->forget('bookname');
      return redirect()->back();

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
       return view('home.edit',compact('departments','borrowers'));
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
        ]);
        $regimental=$request->regimental;
        $rank=$request->rank;
        $name=$request->name;
        $department_id=$request->department;
        $borrowers=Borrower::findOrFail($id);
        $borrowers->regimental=$regimental;
         $borrowers->rank=$rank;
          $borrowers->name=$name;
           $borrowers->dep_id=$department_id;
           $borrowers->save();
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
       if (Borrower::where('id', $id)->delete()) {
            return redirect()->back();
        }else{
             return redirect()->back();
        }
    }

    //Select book
    public function selectBook($id){
      $book=Book::find($id);
      if(!session()->has('bookname')) {
      session()->put('bookname', [[       //Notice the 2 brackets. Y? Checkout below.
      $book->id => $book->name
    ]]);
  } else {
    session()->push('bookname', [        //pushing into array
      $book->id => $book->name
    ]);
  }
  return redirect()->back();
    }

    //remove book
    public function removebook($id){
      $books = session()->get('bookname');
      foreach($books as $outerkey=>$book){
          foreach($book as $key=>$mybook){
              if($key==$id){
                unset($books[$outerkey]);
              }
          }
      }
      session()->put('bookname', $books);
      return redirect()->back();
    }

 


}
