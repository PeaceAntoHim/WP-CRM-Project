@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">{{ isset($contact) ? 'Edit Contact' : 'Add New Contact' }}</h2>

        <form action="{{ isset($contact) ? route('contacts.update', $contact->id) : route('contacts.store') }}" method="POST"
            class="bg-white shadow-md rounded-lg p-8 mt-6">
            @csrf
            @if (isset($contact))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="company">Company</label>
                    <input type="text" name="company" value="{{ old('company', $contact->company ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium" for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                </div>
            </div>
            <button type="submit"
                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">{{ isset($contact) ? 'Update Contact' : 'Save Contact' }}</button>
        </form>
    </div>
@endsection
