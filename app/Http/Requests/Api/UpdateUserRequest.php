<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == "PUT") {
            return [
                'email' => ['required', 'email', 'unique:users,email' . $this->id], //Ignore the email unique rule to be able to edit
                'password' => ['required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
                'firstName' => ['nullable', 'required', 'max:150'],
                'lastName' => ['nullable', 'required', 'max:150'],
                'role' => ['required', Rule::in(['Admin', 'Prof', 'Student', 'Other'])],
                'phoneNumber' => ['nullable', 'required', 'max:150'],
                'avatar' => ['nullable', 'required', 'max:150'],
                'researchgroupId' => ['required', 'integer'],
                'departmentId' => ['required', 'integer'],
                'academicgroupId' => ['required', 'integer'],
                'researchGate' => ['nullable', 'required', 'max:150'],
                'googleScholar' => ['nullable', 'required', 'max:150'],
                'linkedin' => ['nullable', 'required', 'max:150'],
                'facebook' => ['nullable', 'required', 'max:150'],
                'tweeter' => ['nullable', 'required', 'max:150'],
                'instagram' => ['nullable', 'required', 'max:150'],
            ];
        } else {
            return [
                'email' => ['sometimes', 'email', 'unique:users,email' . $this->id],
                'password' => ['sometimes', 'required', Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()],
                'firstName' => ['sometimes',  'max:150'],
                'lastName' => ['sometimes',  'max:150'],
                'role' => ['sometimes', Rule::in(['Admin', 'Prof', 'Student', 'Other'])],
                'phoneNumber' => ['sometimes',  'max:150'],
                'avatar' => ['sometimes',  'max:150'],
                'researchgroupId' => ['sometimes', 'required', 'integer'],
                'departmentId' => ['sometimes', 'required', 'integer'],
                'academicgroupId' => ['sometimes', 'required', 'integer'],
                'researchGate' => ['sometimes',  'max:150'],
                'googleScholar' => ['sometimes',  'max:150'],
                'linkedin' => ['sometimes',  'max:150'],
                'facebook' => ['sometimes',  'max:150'],
                'tweeter' => ['sometimes',  'max:150'],
                'instagram' => ['sometimes',  'max:150'],
            ];
        }
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone_number' => $this->phoneNumber,
            'researchgroup_id' => $this->researchgroupId,
            'department_id' => $this->departmentId,
            'academicgroup_id' => $this->academicgroupId,
            'research_gate' => $this->researchGate,
            'google_scholar' => $this->googlrScholar,
            'password' => bcrypt($this->password),
        ]);
    }
}
