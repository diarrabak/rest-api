<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == "PUT") {
            return [
                'role' => ['required', Rule::in(['Admin', 'Prof', 'Student', 'Other'])]
            ];
        } else {
            return [
                'role' => ['sometimes', 'required', Rule::in(['Admin', 'Prof', 'Student', 'Other'])]
            ];
        }
    }
}
