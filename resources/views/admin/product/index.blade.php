@extends('admin.app')

@section('title', 'Admin')

@section('content')
<div class="col py-3">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card my-5">
                <h1 class="card-header">List of Products</h1>
                <div class="card-body">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-success me-2">Create</a>
                    <div class="d-flex justify-content-between mb-3"></div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img class="img-fluid" width="100" src="{{ asset($product->file) }}" />
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>Rp. {{ number_format($product->price, 0) }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{ $product->update_by }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
