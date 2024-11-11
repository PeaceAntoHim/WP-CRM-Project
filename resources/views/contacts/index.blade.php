@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">Contacts</h2>
        <a href="{{ route('contacts.create') }}"
            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Contact</a>

        <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 font-medium text-gray-600">Name</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Company</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Email</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Phone</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($contacts as $contact)
                        <tr class="border-t">
                            <td class="py-3 px-6">{{ $contact->name }}</td>
                            <td class="py-3 px-6">{{ $contact->company }}</td>
                            <td class="py-3 px-6">{{ $contact->email }}</td>
                            <td class="py-3 px-6">{{ $contact->phone }}</td>
                            <td class="py-3 px-6">
                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                    class="text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
