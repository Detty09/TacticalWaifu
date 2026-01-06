@extends('layouts.guest')

@section('title', 'Create Character')

@section('content')
    <div class="max-w-4xl mx-auto mt-12 p-6 bg-pink-700 dark:bg-pink-700 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-pink-200 dark:text-pink-200">Create Your Character</h1>

        <form action="{{ route('character.store') }}" method="POST" class="flex flex-col space-y-4">
            @csrf

            <!-- Name -->
            <div class="flex-1 flex-col">
                <label class="font-bold mb-1 text-pink-200" for="name">Name</label>
                <input type="text" name="name" id="name" required
                       class="p-2 rounded border border-pink-600 dark:border-black bg-pink-100 dark:bg-pink-400">
            </div>

            <!-- Dere Type, Number -->
            <div class="flex flex-row flex-wrap gap-32 items-end">
                <div class="flex flex-col">
                    <label class="font-bold text-pink-200" for="dere_type_id">Dere Type</label>
                    <select name="dere_type_id" id="dere_type_id" required
                            class="p-2 rounded border border-pink-600 dark:border-black bg-pink-400">
                        <option value="">Select Dere Type</option>
                        @foreach($deretypes as $dere)
                            <option value="{{ $dere->id }}">{{ $dere->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col">
                    <label class="font-bold text-pink-200" for="number">Number (Waifu → Tactical)</label>
                    <div class="flex flex-row items-center gap-2">
                        <select name="number" id="number" required
                                class="p-2 rounded border border-pink-600 dark:border-black bg-pink-100 dark:bg-pink-400">
                            @for($i = 2; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <span id="labelDisplay" class="text-pink-100 hidden"></span>
                    </div>
                </div>
            </div>

            <!-- Hair Color, Eye Color, Height -->
            <div class="flex flex-row flex-wrap gap-32 items-end">
                <div class="flex flex-col">
                    <label class="font-bold mb-1 text-pink-200">
                        Hair Color
                    </label>

                    <div class="flex items-center gap-4">
                        <!-- Color Picker -->
                        <input
                            type="color"
                            id="hair_color_picker"
                            value="#000000"
                            class="w-16 h-10 rounded cursor-pointer border border-pink-600"
                        >

                        <!-- HEX Input -->
                        <input
                            type="text"
                            id="hair_color_hex"
                            name="hair_color_hex"
                            value="#000000"
                            maxlength="7"
                            placeholder="#000000"
                            class="p-2 rounded border bg-pink-100 w-32"
                        >
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-bold mb-1 text-pink-200">
                        Eye Color
                    </label>

                    <div class="flex items-center gap-4">
                        <!-- Color Picker -->
                        <input
                            type="color"
                            id="eye_color_picker"
                            value="#3366ff"
                            class="w-16 h-10 rounded cursor-pointer border border-pink-600"
                        >

                        <!-- HEX Input -->
                        <input
                            type="text"
                            id="eye_color_hex"
                            name="eye_color_hex"
                            value="#3366ff"
                            maxlength="7"
                            placeholder="#3366ff"
                            class="p-2 rounded border bg-pink-100 w-32"
                        >
                    </div>
                </div>


                <div class="flex flex-col">
                    <label for="height" class="text-pink-200 font-bold mb-1">Height (cm)</label>
                    <input
                        type="number"
                        id="height"
                        name="height"
                        class="p-2 border rounded w-32 text-center border-pink-600 dark:border-black bg-pink-100 dark:bg-pink-400 "
                        min="120"
                        max="210"
                        value="150"
                    >
                </div>
            </div>

            <!-- Height,Weapon -->
            <div class="flex flex-row flex-wrap gap-6 items-end">
                <div class="flex flex-col gap-2">
                    <label class="font-bold mb-1 text-pink-200" for="eye_color_id">Tacticool Weapon</label>
                    <select name="weapon_id" id="weapon" required
                            class="p-2 rounded border border-pink-600 dark:border-black bg-pink-100 dark:bg-pink-400 disabled:bg-gray-300 disabled:text-gray-500
           disabled:cursor-not-allowed disabled:border-gray-400">
                        <option value="">Select Weapon</option>
                        @foreach($weapons as $weapon)
                            <option value="{{ $weapon->id }}">{{ $weapon->name }}</option>
                        @endforeach
                    </select>
                    <button
                        type="button"
                        id="new_weapon"
                        class="whitespace-nowrap bg-rose-500 dark:bg-rose-500 text-black
                   py-2 px-2 rounded hover:bg-pink-200 transition bg-clip-padding">
                        Add new weapon
                    </button>
                </div>
                <!-- New Weapon Form -->
                <div id="new_weapon_form" class="hidden mt-2 flex-col gap-2">
                    <input
                        type="text"
                        name="new_weapon_name"
                        placeholder="Weapon name"
                        class="p-2 rounded border border-pink-600 bg-pink-400 dark:bg-pink-400">
                </div>

            </div>


            <!-- Player Goal -->
            <div class="flex flex-col">
                <label class="font-bold mb-1 text-pink-200" for="player_goal">Player Goal</label>
                <input type="text" name="player_goal" id="player_goal" required
                       class="p-2 rounded border border-pink-600 dark:border-black bg-pink-100 dark:bg-pink-400">
            </div>

            <!-- Character Goal -->
            <div class="flex flex-col gap-2">

                <label class="font-bold text-pink-200" for="character_goal_id">
                    Character Goal
                </label>

                <div class="flex items-center gap-4">
                    <select name="character_goal_id" id="character_goal_id" required
                            class="flex-1 p-2 rounded border border-pink-600 dark:border-black
                       bg-pink-100 dark:bg-pink-400 disabled:bg-gray-300 disabled:text-gray-500
           disabled:cursor-not-allowed disabled:border-gray-400">
                        <option value="">Select Character Goal</option>
                        @foreach($characterGoals as $goal)
                            <option value="{{ $goal->id }}">{{ $goal->description }}</option>
                        @endforeach
                    </select>

                    <button
                        type="button"
                        id="new_goal"
                        class="whitespace-nowrap bg-rose-500 dark:bg-rose-500 text-black
                   py-2 px-4 rounded hover:bg-pink-200 transition">
                        Add new goal
                    </button>
                </div>

                <!--New Goal Form-->
                <div
                    id="new_goal_form"
                    class="hidden mt-4 flex flex-col gap-4"
                >
                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-bold text-pink-200">
                            New Goal Name
                        </label>

                        <input
                            type="text"
                            name="new_goal_name"
                            placeholder="e.g. Become the ultimate tactician"
                            class="p-2 rounded border border-pink-600
                   bg-pink-400 dark:bg-pink-400"
                        >
                    </div>

                    <div class="flex flex-col gap-1">
                        <label class="text-sm font-bold text-pink-200">
                            Goal Description
                        </label>

                        <textarea
                            name="new_goal_description"
                            placeholder="Describe the character’s long-term goal..."
                            rows="3"
                            class="p-2 rounded border border-pink-600
                   bg-pink-400 dark:bg-pink-400"
                        ></textarea>
                    </div>

                </div>


                <!-- Password -->
                <div class="flex flex-col">
                    <label class="font-bold mb-1 text-red-400" for="password">Password (Optional)</label>
                    <input type="password" name="password" id="password"
                           placeholder="Protect this character (optional)"
                           class="p-2 rounded border border-red-950 dark:border-black bg-red-500 dark:bg-red-700">
                    <p id="passwordError" class="text-gray-800  text-sm mt-1"> Password must be at least 3
                        characters</p>
                </div>

                <button type="submit"
                        class="bg-pink-600 dark:bg-pink-700 text-white font-bold py-2 px-4 rounded hover:bg-pink-700 dark:hover:bg-pink-400 mt-4">
                    Save Character
                </button>
            </div>
        </form>

        <div>
            <a href="/"
               class="fixed top-8 right-8 px-6 py-3 text-xl font-bold dark:bg-pink-600 dark:hover:bg-pink-400 dark:text-pink-200 border hover:border-pink-600 hover:text-white rounded-xl shadow-lg">
                Back
            </a>
        </div>
    </div>

    <script>
        const picker = document.getElementById('hair_color_picker');
        const hexInput = document.getElementById('hair_color_hex');

        picker.addEventListener('input', () => {
            hexInput.value = picker.value.toLowerCase();
        });

        hexInput.addEventListener('input', () => {
            const value = hexInput.value;
            if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                picker.value = value;
            }
        });
    </script>
    <script>
        const pickerEye = document.getElementById('eye_color_picker');
        const hexInputEye = document.getElementById('eye_color_hex');

        pickerEye.addEventListener('input', () => {
            hexInputEye.value = pickerEye.value.toLowerCase();
        });

        hexInputEye.addEventListener('input', () => {
            const value = hexInputEye.value;
            if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                pickerEye.value = value;
            }
        });
    </script>



    <script>
        const heightSlider = document.getElementById('height');
        const heightValue = document.getElementById('heightValue');
        heightSlider.addEventListener('input', () => {
            heightValue.textContent = heightSlider.value;
        });

        const heightInput = document.getElementById('height');

        heightInput.addEventListener('blur', () => {
            let value = parseInt(heightInput.value);
            if (isNaN(value)) {
                heightInput.value = 150;
            } else if (value < 120) {
                heightInput.value = 120;
            } else if (value > 210) {
                heightInput.value = 210;
            }
        });
    </script>
    <script>
        const numberSelect = document.getElementById('number');
        const labelDisplay = document.getElementById('labelDisplay');

        function updateLabel() {
            const value = parseInt(numberSelect.value);
            switch (value) {
                case 2:
                    labelDisplay.textContent = "Waifu!";
                    labelDisplay.classList.remove('hidden');
                    break;
                case 3:
                    labelDisplay.textContent = "Rather Waifu!";
                    labelDisplay.classList.remove('hidden');
                    break
                case 4:
                    labelDisplay.textContent = "Rather Tactical!";
                    labelDisplay.classList.remove('hidden');
                    break;
                case 5:
                    labelDisplay.textContent = "Tactical!";
                    labelDisplay.classList.remove('hidden');
                    break;
                default:
                    labelDisplay.textContent = "";
                    labelDisplay.classList.add('hidden');
            }

        }

        updateLabel();
        numberSelect.addEventListener('change', updateLabel);
    </script>
    <script>
        const goalSelect = document.getElementById('character_goal_id');
        const newGoalBtn = document.getElementById('new_goal');
        const newGoalForm = document.getElementById('new_goal_form');
        const newGoalName = newGoalForm.querySelector('input');
        const newGoalDesc = newGoalForm.querySelector('textarea');

        newGoalBtn.addEventListener('click', () => {
            newGoalForm.classList.toggle('hidden');

            if (!newGoalForm.classList.contains('hidden')) {
                goalSelect.value = '';
                goalSelect.disabled = true;
                newGoalName.required = true;
                newGoalDesc.required = true;
            } else {
                goalSelect.disabled = false;
                newGoalName.required = false;
                newGoalDesc.required = false;
                newGoalName.value = '';
                newGoalDesc.value = '';
            }
        });

        goalSelect.addEventListener('change', () => {
            newGoalForm.classList.add('hidden');
            newGoalName.required = false;
            newGoalDesc.required = false;
            newGoalName.value = '';
            newGoalDesc.value = '';
            goalSelect.disabled = false;
        });
    </script>
    <script>
        const weaponSelect = document.getElementById('weapon');
        const newWeaponButton = document.getElementById('new_weapon');
        const newWeaponForm = document.getElementById('new_weapon_form');
        const newWeaponInput = newWeaponForm.querySelector('input');
        newWeaponButton.addEventListener('click', () => {
            newWeaponForm.classList.toggle('hidden');
            if (!newWeaponForm.classList.contains('hidden')) {
                weaponSelect.value = '';
                weaponSelect.disabled = true;
                newWeaponInput.required = true;
            } else {
                weaponSelect.disabled = false;
                newWeaponInput.required = false;
                newWeaponInput.value = '';
            }
        })
        weaponSelect.addEventListener('change', () => {
            newWeaponForm.classList.add('hidden');
            newWeaponInput.required = false;
            newWeaponInput.value = '';
            weaponSelect.disabled = false;
        });
    </script>

@endsection
