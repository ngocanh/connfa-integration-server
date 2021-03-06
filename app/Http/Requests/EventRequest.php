<?php

namespace App\Http\Requests;

/**
 * Class EventRequest
 * @package App\Http\Requests
 */
class EventRequest extends Request
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
        $validation = [];
        if (in_array($this->method(), ['POST', 'PUT'])) {
            $validation = [
                'start_at' => 'required|date_format:Y-m-d H:i:s',
                'end_at' => 'required|date_format:Y-m-d H:i:s|greater_than_field:start_at',
                'name' => 'required',
                'url' => 'url',
            ];
        }

        return $validation;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'end_at.greater_than_field' => 'Should be more than the Start at',
        ];
    }
}
