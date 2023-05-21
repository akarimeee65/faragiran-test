<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LessonStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'price' => ['required', 'numeric', 'between:0, 9999999999.999']
        ];
    }

    /**
     * Validate http request
     *
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => __('messages.validation.error'),
            'data' => $validator->errors()
        ]));
    }

    /**
     * Custom error Message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('messages.lesson.store.name.required'),
            'name.string' => __('messages.lesson.store.name.string'),
            'name.max' => __('messages.lesson.store.name.max'),
            'course_id.required' => __('messages.lesson.store.course_id.required'),
            'course_id.integer' => __('messages.lesson.store.course_id.integer'),
            'course_id.exists' => __('messages.lesson.store.course_id.exists'),
            'price.required' => __('messages.global.price.required'),
            'price.between' => __('messages.global.price.between'),
        ];
    }
}
