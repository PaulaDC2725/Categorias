<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductExport;
class ProductController extends Controller
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

    public function ShowProducts()
    {
        $productList = Product::has('brand')->get();
        return view('product/list', ['productList' => $productList]);
    }

    /* function form(){
        return view('product.create');
    } */

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = NULL)
    {
        if($id==NULL){
            $product = new Product();
        }else{
            $product = Product::findOrFail($id);

        }
        $brand = Brand::all();
        return view('product/create', ['product' => $product, 'brand' => $brand]);
        $categoria = Categoria::all();
        return view('product/create', ['product' => $product, 'categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
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

        $product = new Product();

        if($request->id>0){
            $product = Product::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'categoria_id' => 'required|numeric'
        ]);

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->categoria_id = $request->categoria_id;

        $product->save();
        return redirect('/products')->with('success', 'Product created.');
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    /* public function update(Request $request, Product $product)
    {
        $product = new Product(
            $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric',
            'brand' => 'required|max:50'
        ]));
        $product->update();
        return redirect('/products')->with('success', 'Product updated.');
    } */

    function delete($id){
        $producto = Product::find($id);
        $producto->delete();
        return redirect('/products')->with('success', 'Product deleted.');
    }

    public function fileExport()
    {
        return Excel::download(new ProductExport, 'products-collection.xlsx');
    }

}
