<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Booking;
use App\Models\Booking_Lapangan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $id = Auth::user()->id;
        $bookings = Booking_Lapangan::where('user_id', $id)->get();
        return view('pages.booking.index', compact('bookings'));
    }
    public function createByid($id)
    {

        $product = Lapangan::find($id);
        return view('pages.products.booking', compact('product'));
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
            'play_date' => 'required',
            'product_id' => 'nullable',
            'payment_method' => 'required',
        ]);

        if ($validateData['payment_method'] == "COD") {
            $validateData['status'] = "Processed";
        }

        $validateData['user_id'] = Auth::user()->id ?? null;
        $validateData['update_by'] = Auth::user()->name ?? null;

        //        dd($validateData);

        Booking_Lapangan::create($validateData);


        return redirect()->route('product.index')->with('success', 'Produk berhasil diboking');
    }

    public function updateStatus($id, string $status)
    {
        $booking = Booking_Lapangan::findOrFail($id);

        $booking->status = $status;

        $booking->save();

        return redirect()->route('admin.booking.index');
    }
}
