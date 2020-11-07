@extends('layouts.app')
@section('content')
    <div class="card">
        <h2 class="card-header">@lang('products.titles.create')</h2>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" id="productCreationForm">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('products.fields.name')</label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="code">@lang('products.fields.code')</label>
                    <input type="text" name="code" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" id="code" value="{{ old('code', $product->code) }}" required>
                </div>
                <div class="form-group">
                    <label for="price">@lang('products.fields.price')</label>
                    <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : ''}}" id="price" value="{{ old('price', $product->price) }}" required>
                </div>
                <div class="form-group">
                    <label for="stock">@lang('products.fields.stock')</label>
                    <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid' : ''}}" id="stock" value="{{ old('stock', $product->stock) }}" required>
                </div>
                <div class="form-group">
                    <label for="description">@lang('products.fields.description')</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button type="submit" form="productCreationForm" class="btn btn-success">@lang('common.actions.create')</button>
        </div>
    </div>
@endsection
