<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => 'required|string',
            'recipient' => 'required|string',
            'key' => 'required|string',
            'expiry_option' => 'required|string|in:delete_after_view,delete_on_date',
            'expiry' => 'nullable|date',
        ];
    }
}
