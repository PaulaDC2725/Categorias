<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class CategoriaController extends Controller
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

    public function ShowCategorias()
    {
        $categoriaList = Categoria::all();
        return view('categoria/list', ['categoriaList' => $categoriaList]);
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = NULL)
    {
        if($id==NULL){
            $categoria = new Categoria();
        }else{
            $categoria = Categoria::findOrFail($id);

        }
        return view('categoria/create', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $product)
    {
        return view('categoria.edit', compact('categoria'));
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

        $categoria = new Categoria();

        if($request->id>0){
            $categoria = Categoria::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ]);

        $categoria->name = $request->name;
        $categoria->description = $request->description;

        $categoria->save();
        return redirect('/categorias')->with('success', 'Categoria created or updated successfully.');
    }

    function delete($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect('/categorias')->with('success', 'Categoria eliminada.');
    }

}
