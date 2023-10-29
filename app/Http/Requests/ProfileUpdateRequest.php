<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Beneficiary;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string', 'max:255'],
            'gender' => ['required','string', 'max:255'],
            'email' => ['nullable','email', 'max:255', Rule::unique(Beneficiary::class)->ignore($this->user()->id)],
            'id_number' => ['required','numeric'],
            'address' => ['required','string','max:255'],
            'age' => ['required','numeric'],
            'social_situation_id' => ['required','numeric','exists:social_situations,id'],
            'children_no' => ['required','numeric'],
            'is_bank_account' => ['required','numeric'],
            'branch_name' => ['nullable','string','max:255'],
            'account_no' => ['nullable','numeric'],
            'bank_id' => ['nullable','numeric','exists:banks,id'],
            'image' => ['nullable','mimes:jpg,bmp,png','max:2048'],
            'id_image' => ['nullable','mimes:jpg,bmp,png','max:2048'],
        ];
    }
}
