@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-semibold mb-4">Add New Interaction</h1>
        <form action="{{ route('interactions.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="contact_id" class="block text-sm font-medium">Contact</label>
                <select name="contact_id" required class="w-full border-gray-300 rounded px-4 py-2 mt-1">
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium">Type</label>
                <select name="type" required class="w-full border-gray-300 rounded px-4 py-2 mt-1">
                    @foreach ($types as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="note" class="block text-sm font-medium">Note</label>
                <textarea name="note" required class="w-full border-gray-300 rounded px-4 py-2 mt-1"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
