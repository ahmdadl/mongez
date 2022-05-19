<?php

namespace HZ\Illuminate\Mongez\Http;

use HZ\Illuminate\Mongez\Http\ApiResponse;
use HZ\Illuminate\Mongez\Translation\Traits\Translatable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ApiFormRequest extends FormRequest
{
    use ApiResponse, Translatable;

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, $this->badRequest($validator->errors()));
    }
}
