<!-- resources/views/pages/product/edit.blade.php -->
<x-app-layout title="Update Product">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Edit Product</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('booking.store') }}" method="POST" class="p-4" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="play_date" class="form-label">Select Date</label>
                        <input type="date" name="play_date" id="play_date" class="form-control @error('play_date') is-invalid @enderror">

                        @error('play_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="timeInput">mulai:</label>
                        <input type="time" class="form-control @error('start_at') is-invalid @enderror"
                            value="{{ old('start_at') }}" id="timeInput" name="start_at">
                        @error('start_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="timeInput">sampai:</label>
                        <input type="time" class="form-control @error('end_at') is-invalid @enderror"
                            value="{{ old('price') }}" id="timeInput" name="end_at">
                        @error('end_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Payment Method</label>
{{--                        <input type="text" name="payment_method" >--}}
                        <select id="status" name="payment_method" class="form-control @error('payment_method') is-invalid @enderror">
                            <option value="" selected >Select</option>
                            <option value="COD" {{ old('payment_method') == 'COD' ? 'selected' : '' }}>COD</option>
{{--                            <option value="Transfer" {{ old('payment_method') == 'Transfer' ? 'selected' : '' }}>Transfer</option>--}}
                        </select>
                        @error('payment_method')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <input hidden type="text" id="name" name="product_id" class="form-control" value="{{ $product->id }} ">
                    </div>

                    <button type="submit" class="btn mt-5 btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
