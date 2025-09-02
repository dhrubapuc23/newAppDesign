<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name' => 'required|min:3|max:50',
             'email' => 'required|email',
             'semester' => 'required|min:1|max:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Student Name is required',
            'name.min' => 'Min character at least 3',
            'name.max' => 'Max character at most 50',
            'email.required' => 'Email is required',
            'email.email' => 'Provide a valid email',
            'semester.required' => 'Semester is required',
            'semester.min' => 'Min semester 1',
            'semester.max' => 'Max semester 8',
        ];
    }
}
