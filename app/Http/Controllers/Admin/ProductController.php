<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SaveProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware("role:admin");
    }
    public function index()
    {
        $products = Lapangan::all();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }
    public function store(SaveProductRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = Auth::user()->id ?? null;
        $validatedData['update_by'] = Auth::user()->name ?? null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $tujuanFile = 'img/' . $namaFile;

            $file->move(public_path('img'), $namaFile);

            $validatedData['file'] = $tujuanFile;
        }

        Lapangan::create($validatedData);


        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil disimpan');
    }
    public function edit($id)
    {
        $product = Lapangan::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }
    public function update(SaveProductRequest $request, $id)
    {
        $product = Lapangan::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['update_by'] = Auth::user()->name ?? "";
        if ($product->file) {
            // Dapatkan path lengkap file
            $filePath = public_path($product->file);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $tujuanFile = 'img/' . $namaFile;

            $file->move(public_path('img'), $namaFile);

            $validatedData['file'] = $tujuanFile;
        }

        $product->update($validatedData);


        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil diperbarui');
    }
    public function destroy($id)
    {
        $product = Lapangan::findOrFail($id);

        if ($product->file) {
            // Dapatkan path lengkap file
            $filePath = public_path($product->file);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.product.index')->with('success', 'Produk berhasil dihapus');
    }

}
