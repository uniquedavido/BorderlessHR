<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:20',
            'description' => 'required|min:50',
            'roles' => 'required|min:50',
            'category' => 'required|numeric',
            'position' => 'required|min:3',
            'address' => 'required|min:20',
            'type' => 'required|min:3',
            'status' => 'required',
            'last_date' => 'required',
        ];
    }
}
