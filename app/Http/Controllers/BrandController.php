<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class BrandController extends Controller
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

    public function ShowBrands()
    {
        $brandList = Brand::all();
        return view('brand/list', ['brandList' => $brandList]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = NULL)
    {
        if($id==NULL){
            $brand = new Brand();
        }else{
            $brand = Brand::findOrFail($id);

        }
        return view('brand/create', ['brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $product)
    {
        return view('brand.edit', compact('brand'));
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

        $brand = new Brand();

        if($request->id>0){
            $brand = Brand::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ]);

        $brand->name = $request->name;
        $brand->description = $request->description;

        $brand->save();
        return redirect('/brands')->with('success', 'Brand created or updated successfully.');
    }

    function delete($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brands')->with('success', 'Brand deleted.');
    }

}
