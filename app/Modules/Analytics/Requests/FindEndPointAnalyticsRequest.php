<?php

namespace App\Modules\Analytics\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FindEndPointAnalyticsRequest extends FormRequest
{
    protected const ALLOWED_METHODS = [
        'POST', 'GET', 'DELETE', 'PUT', 'PATCH'
    ];

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
        return [
            'endpoint'  => 'nullable|string|max:130',
            'method'  => [
                'nullable',
                Rule::in(static::ALLOWED_METHODS),
            ],
        ];
    }
}
