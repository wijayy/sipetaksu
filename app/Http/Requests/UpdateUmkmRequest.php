<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUmkmRequest extends FormRequest
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
            'image' => ['file', 'image'],
            'images.*' => ['file', 'image'],
            'nama' => ['required'],
            'categories_id' => "required|numeric",
            'longitude' => "required|numeric",
            'latitude' => "required|numeric",
            "kontak" => "required|starts_with:62",
            'maps' => "required|url:http,https",
            'jamBuka' => 'required',
            'jamTutup' => 'required',
            'alamat' => 'required',
            'user_id' => 'required',
            'deskripsi' => 'required',
        ];
    }
}
