<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'group_id' => 'required',
            'course_id' => 'required',
            'questionTypeToAdd' => 'required',
            'questions' => 'required|array',
        ];
    }
}
