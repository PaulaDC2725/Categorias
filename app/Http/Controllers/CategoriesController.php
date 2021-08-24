<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CategoriesController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function ShowCategories()
    {
        $categoryList = Categories::all();
        return view('categories/list', ['categoryList' => $categoryList]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = NULL)
    {
        if($id==NULL){
            $category = new Categories();
        }else{
            $category = Categories::findOrFail($id);

        }
        return view('categories/create', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        /* $request->validate([
            'name' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'brand' => 'required'
        ]); */

        $category = new Categories();

        if($request->id>0){
            $category = Categories::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ]);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();
        return redirect('/categories')->with('success', 'Category created or updated successfully.');
    }

    function delete($id){
        $category = Categories::find($id);
        $category->delete();
        return redirect('/categories')->with('success', 'Category deleted.');
    }
}
