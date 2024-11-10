@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">Sales</h2>
        <a href="{{ route('sales.create') }}"
            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Sale</a>

        <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 font-medium text-gray-600">Contact Name</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Amount</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Invoice Date</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($sales as $sale)
                        <tr class="border-t">
                            <td class="py-3 px-6">{{ $sale->contact->name }}</td>
                            <td class="py-3 px-6">${{ number_format($sale->amount, 2) }}</td>
                            <td class="py-3 px-6">{{ \Carbon\Carbon::parse($sale->invoice_date)->format('d/m/Y') }}</td>
                            <td class="py-3 px-6">
                                <form actio
