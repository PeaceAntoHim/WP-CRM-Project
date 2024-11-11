<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use App\Models\Contact;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    // Menampilkan semua interaksi untuk kontak tertentu
    public function index()
    {
        $interactions = Interaction::all();
        return view('interactions.index', compact('interactions'));
    }

    // Menyimpan interaksi baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'contact_id' => 'required', // Ensures contact_id exists in contacts table
            'note' => 'nullable|string'
        ]);

        // Create and save the interaction directly to the interactions table
        Interaction::create([
            'type' => $validatedData['type'],
            'contact_id' => $validatedData['contact_id'], // This will associate the interaction with the contact
            'note' => $validatedData['note']
        ]);

        // Redirect to the interactions index with a success message
        return redirect()->route('interactions.index')
            ->with('success', 'Interaction created successfully.');
    }


    public function create()
    {
        $types = [
            'email' => 'Email',
            'phone' => 'Phone',
            'meeting' => 'Meeting'
        ];
        $contacts = Contact::all();
        return view('interactions.create', compact('contacts', 'types'));
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
