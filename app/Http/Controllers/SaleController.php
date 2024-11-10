<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('contact')->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $contacts = Contact::all();
        return view('sales.create', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'amount' => 'required|numeric',
            'invoice_date' => 'required|date',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')
            ->with('success', 'Sale record created successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Sale record deleted successfully.');
    }
}
