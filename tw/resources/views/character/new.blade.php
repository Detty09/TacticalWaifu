@extends('layouts.guest')

@section('title', 'Create Character')

@section('content')
    <div class="max-w-4xl mx-auto mt-12 p-6 bg-pink-50 dark:bg-pink-900 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-pink-600 dark:text-pink-200">Create Your Character</h1>

        <form action="{{ route('character.store') }}" method="POST" class="flex flex-col space-y-4">
            @csrf

            <!-- Name -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="name">Name</label>
                <input type="text" name="name" id="name" required
                       class="p-2 rounded border border-gray-300 dark:border-gray-700">
            </div>

            <!-- Dere Types -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="dere_type_id">Dere Type</label>
                <select name="dere_type_id" id="dere_type_id" required
                        class="p-2 rounded border border-gray-300 dark:border-gray-700">
                    <option value="">Select Dere Type</option>
                    @foreach($deretypes as $dere)
                        <option value="{{ $dere->id }}">{{ $dere->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Hair Color -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="hair_color_id">Hair Color</label>
                <select name="hair_color_id" id="hair_color_id" required
                        class="p-2 rounded border border-gray-300 dark:border-gray-700">
                    <option value="">Select Hair Color</option>
                    @foreach($hairColors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Number (Waifu - Tactical 2-5) -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="number">Number (Waifu → Tactical)</label>
                <select name="number" id="number" required
                        class="p-2 rounded border border-gray-300 dark:border-gray-700">
                    @for($i = 2; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Player Goal -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="player_goal">Player Goal</label>
                <input type="text" name="player_goal" id="player_goal" required
                       class="p-2 rounded border border-gray-300 dark:border-gray-700">
            </div>

            <!-- Character Goal -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="character_goal_id">Character Goal</label>
                <select name="character_goal_id" id="character_goal_id" required
                        class="p-2 rounded border border-gray-300 dark:border-gray-700">
                    <option value="">Select Character Goal</option>
                    @foreach($characterGoals as $goal)
                        <option value="{{ $goal->id }}">{{ $goal->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Eye Color -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="eye_color_id">Eye Color</label>
                <select name="eye_color_id" id="eye_color_id" required
                        class="p-2 rounded border border-gray-300 dark:border-gray-700">
                    <option value="">Select Eye Color</option>
                    @foreach($eyeColors as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Height Slider -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="height">Height (cm): <span id="heightValue">175</span>cm</label>
                <input type="range" min="140" max="210" value="175" step="1" name="height" id="height"
                       class="w-full">
            </div>
            <!-- Password -->
            <div class="flex flex-col">
                <label class="font-bold mb-1" for="password">Password (Optional)</label>
                <input type="password" name="password" id="password"
                       placeholder="Protect this character (optional)"
                       class="p-2 rounded border border-gray-300 dark:border-gray-700">
            </div>

            <button type="submit"
                    class="bg-pink-600 dark:bg-pink-700 text-white font-bold py-2 px-4 rounded hover:bg-pink-700 dark:hover:bg-pink-400 mt-4">
                Save Character
            </button>
        </form>
    </div>

    <script>
        const heightSlider = document.getElementById('height');
        const heightValue = document.getElementById('heightValue');
        heightSlider.addEventListener('input', () => {
            heightValue.textContent = heightSlider.value;
        });
    </script>





@endsection
