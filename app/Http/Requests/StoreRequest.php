<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' =>'required|string|min:3|max:255',
            'description' =>'required|string|min:10',
        ];
    }
}
