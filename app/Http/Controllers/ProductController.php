<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SaveProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Lapangan::all();
        return view('pages.products.index', compact('products'));
    }



}
