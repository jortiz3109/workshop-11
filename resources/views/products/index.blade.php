@extends('layouts.app')
@section('content-top')
    @include('products.__import_modal')
    <nav class="nav justify-content-end">
        <a class="nav-link" href="{{ route('products.create') }}">@lang('common.actions.create')</a>
        <a class="nav-link" href="#!" data-toggle="modal" data-target="#importModal">@lang('common.actions.import')</a>
    </nav>
@endsection
@section('content')
    <div class="card">
        <h2 class="card-header">@lang('products.titles.index')</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>@lang('products.fields.code')</th>
                    <th>@lang('products.fields.name')</th>
                    <th>@lang('products.fields.price')</th>
                    <th>@lang('products.fields.stock')</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->getFormattedPrice() }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $products->render() }}
        </div>
    </div>
@endsection
