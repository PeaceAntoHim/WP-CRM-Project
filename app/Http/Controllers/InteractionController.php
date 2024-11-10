<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Contact;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    // Menampilkan semua interaksi untuk kontak tertentu
    public function index($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        return $contact->interactions;
    }

    // Menyimpan interaksi baru
    public function store(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId);

        $validatedData = $request->validate([
            'type' => 'required|in:email,phone,meeting',
            'notes' => 'nullable|string'
        ]);

        $interaction = new Interaction($validatedData);
        $contact->interactions()->save($interaction);

        return response()->json($interaction, 201);
    }

    // Menampilkan interaksi berdasarkan ID
    public function show($id)
    {
        $interaction = Interaction::findOrFail($id);
        return response()->json($interaction, 200);
    }

    // Mengupdate interaksi
    public function update(Request $request, $id)
    {
        $interaction = Interaction::findOrFail($id);

        $validatedData = $request->validate([
            'type' => 'required|in:email,phone,meeting',
            'notes' => 'nullable|string'
        ]);

        $interaction->update($validatedData);
        return response()->json($interaction, 200);
    }

    // Menghapus interaksi
    public function destroy($id)
    {
        Interaction::destroy($id);
        return response()->json(null, 204);
    }
}
