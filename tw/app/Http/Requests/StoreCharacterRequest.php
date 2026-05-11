<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
        public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',

            'weapon_id' => [
                'nullable',
                'exists:weapons,id',
                'required_without:new_weapon_name',
            ],

            'new_weapon_name' => [
                'nullable',
                'string',
                'max:255',
                'required_without:weapon_id',
            ],

            'character_goal_id' => [
                'nullable',
                'exists:character_goals,id',
                'required_without:new_goal_name',
            ],

            'new_goal_name' => [
                'nullable',
                'string',
                'max:255',
                'required_without:character_goal_id',
            ],

            'new_goal_description' => 'nullable|string',

            'dere_type_id' => 'required|exists:dere_types,id',

            'hair_color_hex' => [
                'nullable',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'eye_color_hex' => [
                'nullable',
                'regex:/^#[0-9A-Fa-f]{6}$/',
            ],

            'number' => 'required|integer|between:2,5',

            'height' => 'required|integer|between:120,210',

            'player_goal' => 'required|string|max:255',

            'password' => 'nullable|string|min:3|max:255',

            'manual_items' => 'nullable|string',
        ];
    }

    /**
     * Optional custom messages.
     */
    public function messages(): array
    {
        return [
            'weapon_id.required_without' =>
                'Select a weapon or create a new one.',

            'new_weapon_name.required_without' =>
                'Enter a weapon name or select an existing weapon.',

            'character_goal_id.required_without' =>
                'Select a goal or create a new one.',

            'new_goal_name.required_without' =>
                'Enter a goal name or select an existing goal.',
        ];
    }
}
