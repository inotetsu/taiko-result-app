<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultAddRequest extends FormRequest
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
        if($this->boolean('play_count')){

            return [
                'play_count' => ['nullable','boolean'],
            ];    

        } else {

            return [
            'good_count' => ['required','integer'],
            'ok_count' => ['required','integer'],
            'miss_count' => ['required','integer'],
            'roll_count' => ['required','integer'],
            'full_combo' => ['nullable','integer'],
            'donda_full_combo' => ['nullable','integer'],
            'play_count' => ['nullable','boolea'],
            'comment' => ['nullable' , 'max:200'],

        ];
        }
    }
}
