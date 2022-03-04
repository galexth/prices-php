<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertPricesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'prices' => 'required|array',
            'prices.*.id' => 'required|uuid|distinct',
            'prices.*.price' => [
                'required', 'distinct', 'numeric', 'min:1', 'max:500000', 'regex:/^\d+(\.\d\d?)?$/'
            ],
        ];
    }
}
