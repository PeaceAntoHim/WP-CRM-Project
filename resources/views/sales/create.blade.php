@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">Add New Sale</h2>

        <form action="{{ route('sales.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-8 mt-6">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-medium" for="contact_id">Contact</label>
                <select name="contact_id" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                    <option value="">Select Contact</option>
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="amount">Amount</label>
                    <input type="number" name="amount" step="0.01"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="invoice_date">Invoice Date</label>
                    <input type="date" name="invoice_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                </div>
                <label class="block text-gray-700 font-medium" for="status">Status</label>
                <select name="status" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                    <option value="">Select status</option>
                    @foreach ($status as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save
                Sale</button>
        </form>
    </div>
@endsection
