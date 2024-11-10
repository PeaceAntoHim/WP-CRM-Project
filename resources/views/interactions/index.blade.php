@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800">Interactions</h2>
        <a href="{{ route('interactions.create') }}"
            class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Log Interaction</a>

        <div class="mt-6 bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 font-medium text-gray-600">Contact</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Type</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Notes</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Date</th>
                        <th class="py-3 px-6 font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($interactions as $interaction)
                        <tr class="border-t">
                            <td class="py-3 px-6">{{ $interaction->contact->name }}</td>
                            <td class="py-3 px-6">{{ $interaction->type }}</td>
                            <td class="py-3 px-6">{{ $interaction->notes }}</td>
                            <td class="py-3 px-6">{{ $interaction->created_at->format('d/m/Y') }}</td>
                            <td class="py-3 px-6">
                                <form action="{{ route('interactions.destroy', $interaction->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
