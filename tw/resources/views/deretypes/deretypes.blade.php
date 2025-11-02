@extends('layouts.guest')

@section('title', 'Dere Types')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-pink-200">Dere Types</h1>

    @if ($deretypes->count())
        <table class="min-w-full bg-pink-200 shadow-md rounded-lg overflow-hidden">
            <thead class="bg-pink-600">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-pink-200">Name</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-pink-200">Description</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($deretypes as $dere)
                <tr class="border-b">
                    <td class="px-6 py-4 font-bold text-pink-600">{{ $dere->name }}</td>
                    <td class="px-6 py-4">{{ $dere->description ?? '-' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No dere types found.</p>
    @endif

<a href="/"
   class="fixed top-8 right-8 px-6 py-3 text-xl font-bold dark:bg-pink-600 dark:hover:bg-pink-400 dark:text-pink-200 border hover:border-pink-600 hover:text-white rounded-xl shadow-lg">
    Back
</a>
</div>
@endsection
