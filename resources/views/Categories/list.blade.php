@extends('layout')
@section('title','Categorias')
@section('encabezado','Lista de Categorias')
@section('content')
{{-- <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.form') }}}">Nuevo Producto</a> --}}
{{--<a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('brand.create') }}">Nueva Marca</a>--}
<a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('categoria.create') }}">Nueva Categoria</a>

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
        @foreach ($categoriaList as $categoria)
        <tr>
            <td>{{ $categoria->name }}</td>
            <td>{{ $categoria->description }}</td>
            <td>
                <a href="{{ route('categoria.create',['id'=>$categoria->id])}}" class="btn btn-primary">Editar</a>
                <a href="/categoria/delete/{{ $categoria->id }}" class="btn btn-danger">Borrar</a>
                {{-- <a href="{{ route('prodDelete', ['id => $product->id']) }}" class="btn btn-danger">Borrar</a> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
