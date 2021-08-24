@extends('layout')
@section('title','Marcas')
@section('encabezado','Lista de Marcas')
@section('content')
{{-- <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.form') }}}">Nuevo Producto</a> --}}
<a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('brand.create') }}">Nueva Marca</a>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-striped table-bordered">
    <thead align="center">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody align="center">
        @foreach ($brandList as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->description }}</td>
            <td>
                <a href="{{ route('brand.create',['id'=>$brand->id])}}" class="btn btn-primary">Editar</a>
                <a href="/brand/delete/{{ $brand->id }}" class="btn btn-danger">Borrar</a>
                {{-- <a href="{{ route('prodDelete', ['id => $product->id']) }}" class="btn btn-danger">Borrar</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
