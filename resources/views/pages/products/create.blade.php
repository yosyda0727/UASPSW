<!-- resources/views/pages/product/create.blade.php -->
<x-app-layout title="Create Product">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Create Product</h2>
            </div>
            <div class="card-body">

                <form action="{{ route('product.store') }}" method="POST" class="p-4" enctype='multipart/form-data'>
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" id="price" name="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                            required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <input type="file" name="file" class="form-control my-4" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    </div>

                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
