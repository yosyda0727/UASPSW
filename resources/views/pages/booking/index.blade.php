<x-app-layout title="Booking">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card my-5">
                <h1 class="card-header">My booking</h1>

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3">
                        <!-- Additional controls if needed -->
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Play Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Status</th>
                                    <th>Payment Method</th>
                                    <th>Proof of Payment</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Updated By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->play_date }}</td>
                                        <td>{{ $booking->start_at }}</td>
                                        <td>{{ $booking->end_at }}</td>
                                        <td>{{ $booking->status }}</td>
                                        <td>{{ $booking->payment_method }}</td>
                                        <td>
                                            @if ($booking->proof_of_payment)
                                                <img class="img-fluid" width="100"
                                                    src="{{ asset($booking->proof_of_payment) }}" />
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->product->name ?? "-"}}</td>
                                        <td>{{ $booking->update_by }}</td>
                                        <td>
                                            @auth
                                                @if(auth()->user()->hasRole(['user']) && ($booking->status === "Processed" || $booking->status === "Not Paid"))
                                                    <a href="{{ route('booking.edit.status', ['id' => $booking->id, 'status' => 'Canceled']) }}"
                                                        class="btn btn-danger">Cancel</a>
                                                @endif
                                                @if(auth()->user()->hasRole(['admin']))
                                                    <a href="{{ route('booking.edit.status', ['id' => $booking->id, 'status' => 'Rejected']) }}"
                                                        class="btn btn-danger">Reject</a>
                                                    <a href="{{ route('booking.edit.status', ['id' => $booking->id, 'status' => 'Accepted']) }}"
                                                        class="btn btn-success">Accept</a>
                                                    <a href="{{ route('booking.edit.status', ['id' => $booking->id, 'status' => 'Finished']) }}"
                                                        class="btn btn-primary">Finish</a>
                                                @endif
                                            @endauth
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
</x-app-layout>