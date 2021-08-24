@extends('layout')
@section('title','Productos')
@section('encabezado','Lista de Productos')
@section('content')
{{-- <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.form') }}}">Nuevo Producto</a> --}}
<a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.create') }}">Nuevo Producto</a>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-striped table-bordered">
    <thead align="center">
        <tr>
            <th>Name</th>
            <th>Cost</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th>Category</th>
            <th></th>
        </tr>
    </thead>
    <tbody align="center">
        @foreach ($productList as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->cost }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->brand->name }}</td>
            <td>{{ $product->categories->name }}</td>
            <td>
                <a href="{{ route('product.create',['id'=>$product->id])}}" class="btn btn-primary">Editar</a>
                <a href="/product/delete/{{ $product->id }}" class="btn btn-danger">Borrar</a>
                {{-- <a href="{{ route('prodDelete', ['id => $product->id']) }}" class="btn btn-danger">Borrar</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
