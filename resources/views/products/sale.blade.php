@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Product</h1>

    <form action="/products/sell" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" readOnly>
            <input type="hidden" name="id" id="id" class="form-control" value="{{ $product->id }}">
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" class="form-control" value="{{ $product->price }}"
                readOnly>
        </div>
        <button type="submit" class="btn btn-primary">Sell</button>
    </form>
</div>
@endsection