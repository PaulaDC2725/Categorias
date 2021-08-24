@extends('layout')
@section('title','Categorías')
@section('encabezado','Lista de Categorías')
@section('content')
{{-- <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.form') }}}">Nuevo Producto</a> --}}
<a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('categories.create') }}">Nueva Categoría</a>

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
        @foreach ($categoryList as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.create',['id'=>$category->id])}}" class="btn btn-primary">Editar</a>
                <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
