@extends('layouts.guest')

@section('title', 'Main Page')

@section('content')
    <div class="text-1xl sm:text-2xl md:text-3xl lg:text-4xl w-full rounded-lg p-2 flex flex-col items-center space-y-6 mt-12">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold dark:text-[#000000]">Welcome to Tactical Waifu character creation!</h1>
    </div>
    <div class="text-base sm:text-base md:text-xl lg:text-2xl max-w-4xl w-full mx-auto rounded-lg p-2 flex flex-col items-center lg:justify-center space-y-6 mt-12">
        <p>This is for creating your own <a href="https://www.drivethrurpg.com/en/product/157352/tactical-waifu" class="underline text-pink-700 hover:text-white">Tactical Waifu</a> character for the roleplaying game. <br>
            You can create character, find character and read background material.</p>
    </div>
    <div class="text-lg sm:text-xl md:text-2xl lg:text-3xl w-full rounded-lg p-2 flex flex-row items-center justify-center space-x-6 mt-12">
        <a href="/new" class="dark:bg-pink-600 dark:hover:bg-pink-400 font-bold dark:text-[#000000] border hover:border-pink-600 hover:text-white rounded-lg leading-normal px-4 py-2">Create</a>
        <button id="findButton" class="dark:bg-pink-600 dark:hover:bg-pink-400 font-bold dark:text-[#000000] border hover:border-pink-600 hover:text-white rounded-lg leading-normal px-4 py-2">Find</button>
        <a href="/deretypes" class="dark:bg-pink-600 dark:hover:bg-pink-400 font-bold dark:text-[#000000] border hover:border-pink-600 hover:text-white rounded-lg leading-normal px-4 py-2">Background</a>
    </div>
    <div id="finder" class="hidden mt-6 max-w-md mx-auto p-6 bg-pink-100 dark:bg-pink-600 rounded-lg shadow-lg">
        <form action="{{ route('character.find') }}" method="POST" class="flex flex-col space-y-4">
            @csrf
            <input type="text" name="id" placeholder="Enter Character ID" required
                   class="p-2 rounded border border-pink-300 dark:border-pink-700 bg-pink-200">
            <input type="password" name="password" placeholder="Enter Password (optional)"
                   class="p-2 rounded border border-pink-300 dark:border-pink-700 bg-pink-200">
            <button type="submit"
                    class="bg-pink-700 dark:hover:bg-pink-200 text-white font-bold py-2 px-2 rounded hover:bg-pink-200">
                Find Character
            </button>
        </form>
    </div>

        <script>
            const button = document.getElementById('findButton');
            const finder = document.getElementById('finder');

            button.addEventListener('click', () => {
                finder.classList.toggle('hidden');
            });
        </script>
@endsection
