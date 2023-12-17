@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ route('product.form') }}">Create Product</a>
    <h1>Product List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sale</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td><a class="btn btn-primary" href="{{ route('products.sell', ['id' => $product->id]) }}">Sale</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection