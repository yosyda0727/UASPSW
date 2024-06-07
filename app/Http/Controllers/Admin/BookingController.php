<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking_Lapangan;
use Illuminate\Http\Request;
use App\Models\Lapangan;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware("role:admin");
    }
    public function index()
    {
        $bookings = Booking_Lapangan::all();
        $lapangan = [];
        $total_harga = 0; // Inisialisasi total harga

        // Loop untuk mendapatkan data lapangan berdasarkan booking
        foreach ($bookings as $booking) {
            $lapangan[$booking->id] = Lapangan::where('id', $booking->product_id)->get();
        }

        // Loop untuk menghitung total harga dari semua lapangan yang relevan
        foreach ($lapangan as $lapanganList) {
            foreach ($lapanganList as $mp) {
                $total_harga += $mp->price; // Menambahkan harga lapangan ke total harga
            }
        }




        return view('admin.booking.index', compact('bookings', 'total_harga'));
    }
    public function updateStatus($id, string $status)
    {
        $booking = Booking_Lapangan::findOrFail($id);

        $booking->status = $status;

        $booking->save();

        return redirect()->route('booking.index');
    }
}
