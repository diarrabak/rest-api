<?php

namespace App\Http\Requests\Api;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        // $articleId = $this->route('article');
        // return Article::where('id', $articleId)->where('user_id', $user->id)->exists();
        return $user != null && $user->tokenCan('*');
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
                'title' => ['required', 'string'],
                'link' => ['required', 'string'],
                'authors' => ['required', 'string'], //we can add min:3 or max:54
                // 'authors.*' => ['required', 'string'], //Individual element in the array, we can add distinct, min ....
                'publication' => ['required', 'string'],
                'year' => ['required', 'date'],
                'userId' => ['required', 'integer'], //use the camelCase as convention in Json
            ];
        } else { //This is the PATCH function
            return [
                'title' => ['sometimes', 'required', 'string'],
                'link' => ['sometimes', 'required', 'string'],
                'authors' => ['sometimes', 'required', 'string'], //we can add min:3 or max:54
                // 'authors.*' => ['sometimes', 'required', 'string'], //Individual element in the array, we can add distinct, min ....
                'publication' => ['sometimes', 'required', 'string'],
                'year' => ['sometimes', 'required', 'date'],
                'userId' => ['sometimes', 'required', 'integer'], //use the camelCase as convention in Json
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId, //Required to save data to the database
        ]);
    }
}
