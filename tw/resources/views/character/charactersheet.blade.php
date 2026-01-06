@extends('layouts.guest')

@section('title', $character->name . ' — Character Sheet')

@section('content')
    <div class="max-w-4xl mx-auto mt-12 p-6 bg-pink-700 rounded-lg shadow-lg">

        <h1 class="text-4xl font-bold text-pink-200 mb-6">
            {{ $character->name }}
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-pink-100">

            <div><strong>UUID:</strong> {{ $character->uuid }}</div>
            <div><strong>Dere Type:</strong> {{ $character->dereType->name }}</div>

            <div class="flex items-center gap-2">
                <strong>Hair Color:</strong>

                @if($character->hair_color_hex)
                    <span
                        class="inline-block w-5 h-5 rounded-full border border-black"
                        style="background-color: {{ $character->hair_color_hex }};"
                        title="{{ $character->hair_color_hex }}"
                    ></span>
                    <span>{{ $character->hair_color_hex }}</span>
                @else
                    <span>—</span>
                @endif
            </div>

            <div class="flex items-center gap-2">
                <strong>Eye Color:</strong>

                @if($character->eye_color_hex)
                    <span
                        class="inline-block w-5 h-5 rounded-full border border-black"
                        style="background-color: {{ $character->eye_color_hex }};"
                        title="{{ $character->eye_color_hex }}"
                    ></span>
                    <span>{{ $character->eye_color_hex }}</span>
                @else
                    <span>—</span>
                @endif
            </div>

            <div><strong>Height:</strong> {{ $character->height_cm }} cm</div>
            <div><strong>Number:</strong> {{ $character->number }}</div>

        </div>

        <div class="mt-6 text-pink-100">
            <p><strong>Player Goal:</strong></p>
            <p class="bg-pink-600 p-3 rounded">{{ $character->player_goal }}</p>
        </div>

        <div class="mt-4 text-pink-100">
            <p><strong>Character Goal:</strong></p>
            <p class="bg-pink-600 p-3 rounded">
                {{ $character->characterGoal->description }}
            </p>
        </div>

        <div class="mt-4">
            <h2 class="text-2xl font-bold text-pink-200">Items</h2>
            <ul class="list-disc pl-6 mt-2">
                @foreach($character->items as $item)
                    <li class="text-pink-100">{{ $item->name }}</li>
                @endforeach
            </ul>
        </div>


        <div class="mt-4">
            <h2 class="text-2xl font-bold text-pink-200">Weapons</h2>
            @if($character->weapons->count())
                <ul class="list-disc pl-6 mt-2">
                    @foreach($character->weapons as $weapon)
                        <li class="text-pink-100">{{ $weapon->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-pink-100">No weapons assigned.</p>
            @endif
        </div>


        <div class="flex gap-4 mt-8">
            <a href="{{ route('character.pdf', $character->uuid) }}"
               target="_blank"
               class="px-4 py-2 bg-pink-400 text-black rounded font-bold">
                View PDF
            </a>

            <a href="{{ route('character.pdf.download', $character->uuid) }}"
               class="px-4 py-2 bg-pink-200 text-black rounded font-bold">
                Download PDF
            </a>
        </div>
        <div>
            <a href="/"
               class="fixed top-8 right-8 px-6 py-3 text-xl font-bold dark:bg-pink-600 dark:hover:bg-pink-400 dark:text-pink-200 border hover:border-pink-600 hover:text-white rounded-xl shadow-lg">
                Back
            </a>
        </div>
    </div>
@endsection

