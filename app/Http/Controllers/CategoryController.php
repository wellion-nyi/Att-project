<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book_category;
use App\Department;
use App\Book;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $departments=Department::all();
        $categories=Book_category::orderby('name','ASC')->get();
        $books=Book::all();
       return view('book_category.index',compact('categories', 'departments','books'));
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
            'book_category'=>'required|string',
        ]);
        $category=$request->book_category;
        $categories= new Book_category;
        $categories->name=$category;
        $categories->save();
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
        $books=Book::where('bookcat_id','=',$id)->get();
        $categories=Book_category::all();
        return view('book_category.index',compact('books','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Book_category::findOrFail($id);
        return view('book_category.edit',compact('categories'));

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
        'category'=>'required|string',
    ]);
    $category=$request->category;
    $categories=Book_category::findOrFail($id);
    $categories->name=$category;
    $categories->save();
    return redirect('/books_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Book_category::where('id', $id)->delete()) {
            return redirect()->back();
        }else{
             return redirect()->back();
        }
    }
}
