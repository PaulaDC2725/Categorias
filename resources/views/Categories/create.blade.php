@extends('layout')
@section('title', $category->id ? 'Update Categories' : 'Create Categories')
@section('encabezado', $category->id ? 'Update Categories' :'Create Categories')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Los campos deben llenarse correctamente.<br><br>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <hr style="border-top: 1px solid rgba(0,0,0,.1);">
            <div class="pull-right">
                <a style="float: right" class="btn btn-primary" href="/categories" title="Volver">Regresar</a>
            </div>
        </div>
    </div>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $category->id }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" name="name" value="{{ old('name') ? old('name') : $category->name }}" class="form-control" placeholder="Name">
                </div>
                @error('name')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" id="description" name="description" value="{{ old('description') ? old('description') : $category->description }}" class="form-control" placeholder="Description">
                </div>
                @error('description')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            </br>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
    {{-- <form action="{{ route('product.save') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost:</strong>
                    <input type="number" id="cost" name="cost" class="form-control" placeholder="Cost">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" id="price" name="price" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" id="quantity"  name="quantity" class="form-control" placeholder="Quantity">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand:</strong>
                    <input type="text" id="brand" name="brand" class="form-control" placeholder="Brand">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            </br>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>

    </form> --}}
@endsection
