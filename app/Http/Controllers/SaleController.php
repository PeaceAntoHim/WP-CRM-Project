<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Contact;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Menampilkan semua penjualan untuk kontak tertentu
    public function index($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        return $contact->sales;
    }

    // Menyimpan penjualan baru
    public function store(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId);

        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'invoice_number' => 'required|string|unique:sales,invoice_number'
        ]);

        $sale = new Sale($validatedData);
        $contact->sales()->save($sale);

        return response()->json($sale, 201);
    }

    // Menampilkan penjualan berdasarkan ID
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return response()->json($sale, 200);
    }

    // Mengupdate penjualan
    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);

        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:0',
            'invoice_number' => 'required|string|unique:sales,invoice_number,' . $id
        ]);

        $sale->update($validatedData);
        return response()->json($sale, 200);
    }

    // Menghapus penjualan
    public function destroy($id)
    {
        Sale::destroy($id);
        return response()->json(null, 204);
    }
}
