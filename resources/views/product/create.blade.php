@extends('layout')
@section('title', $product->id ? 'Update Product' : 'Create Product')
@section('encabezado', $product->id ? 'Update Products' :'Create Products')
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
                <a style="float: right" class="btn btn-primary" href="/products" title="Volver">Regresar</a>
            </div>
        </div>
    </div>
    <form action="{{ route('product.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $product->id }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" id="name" name="name" value="{{ old('name') ? old('name') : $product->name }}" class="form-control" placeholder="Name">
                </div>
                @error('name')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost:</strong>
                    <input type="number" id="cost" name="cost" value="{{ old('cost') ? old('cost') : $product->cost }}" class="form-control" placeholder="Cost">
                </div>
                @error('cost')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" id="price" name="price" value="{{ old('price') ? old('price') : $product->price }}" class="form-control" placeholder="Price">
                </div>
                @error('price')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="number" id="quantity" value="{{ old('quantity') ? old('quantity') : $product->quantity }}" name="quantity" class="form-control" placeholder="Quantity">
                </div>
                @error('quantity')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand:</strong>
                    {{-- <input type="number" id="brand_id" name="brand_id" value="{{ old('brand_id') ? old('brand_id') : $product->brand_id }}" class="form-control" placeholder="Brand"> --}}
                    <select name="brand_id" id="brand_id" class="form-select">
                        @foreach ($brand as $brands)
                            <option value="{{ $brands->id }}" {{ $product->brand_id === $brands->id ? 'selected' : ''}}>{{ $brands->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('brand')
                    <p class="alert-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    {{-- <input type="number" id="categoria_id" name="categoria_id" value="{{ old('categoria_id') ? old('categoria_id') : $product->categoria_id }}" class="form-control" placeholder="Brand"> --}}
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        @foreach ($categoria as $categorias)
                            <option value="{{ $categoria->id }}" {{ $product->categoria_id === $categorias->id ? 'selected' : ''}}>{{ $categorias->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('categoria')
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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoria">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            </br>
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>

    </form> --}}
@endsection
