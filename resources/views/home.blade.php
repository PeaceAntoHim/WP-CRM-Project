<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="text-center py-12">
        <h1 class="text-4xl font-bold text-blue-600 mb-6">Welcome to the CRM Application</h1>
        <p class="text-lg text-gray-700 mb-8">Manage your contacts, interactions, sales, and generate insightful reports
            effortlessly.</p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('contacts.index') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-5 rounded-md">Manage Contacts</a>
            <a href="{{ route('interactions.index') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-5 rounded-md">Track Interactions</a>
            <a href="{{ route('sales.index') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 px-5 rounded-md">Sales Management</a>
            <a href="{{ route('reports.index') }}"
                class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 px-5 rounded-md">View Reports</a>
        </div>
    </div>
@endsection
