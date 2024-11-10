<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index()
    {
        return Contact::with(['interactions', 'sales'])->get();
    }

    // Menyimpan kontak baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'email' => 'required|email|unique:contacts,email',
            'phone_number' => 'nullable|string|max:15'
        ]);

        $contact = Contact::create($validatedData);
        return response()->json($contact, 201);
    }

    // Menampilkan kontak berdasarkan ID
    public function show($id)
    {
        $contact = Contact::with(['interactions', 'sales'])->findOrFail($id);
        return response()->json($contact, 200);
    }

    // Mengupdate data kontak
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'phone_number' => 'nullable|string|max:15'
        ]);

        $contact->update($validatedData);
        return response()->json($contact, 200);
    }

    // Menghapus kontak
    public function destroy($id)
    {
        Contact::destroy($id);
        return response()->json(null, 204);
    }
}
