<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AdressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
       return Company::where('company_id', $this->company_id)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required|uuid',
            'street' => 'required|string|max:180',
            'number' => 'required|integer',
            'complement' => 'nullable|string|max:200',
            'district' => 'nullable|string|max:180',
            'city' => 'nullable|string|max:150',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:150',
            'zipcode' => 'nullable|string|max:60',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

}
