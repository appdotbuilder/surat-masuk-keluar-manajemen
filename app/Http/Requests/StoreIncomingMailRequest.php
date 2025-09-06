<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncomingMailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'mail_number' => 'required|string|max:255|unique:incoming_mails,mail_number',
            'sender_number' => 'nullable|string|max:255',
            'mail_date' => 'required|date',
            'received_date' => 'required|date|after_or_equal:mail_date',
            'sender' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'content' => 'nullable|string',
            'category_id' => 'required|exists:mail_categories,id',
            'type_id' => 'required|exists:mail_types,id',
            'attachment' => 'nullable|string|max:255',
            'status' => 'required|in:pending,processed,archived',
            'received_by' => 'required|exists:employees,id',
            'notes' => 'nullable|string',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'mail_number.required' => 'Mail number is required.',
            'mail_number.unique' => 'This mail number already exists.',
            'mail_date.required' => 'Mail date is required.',
            'received_date.required' => 'Received date is required.',
            'received_date.after_or_equal' => 'Received date must be on or after the mail date.',
            'sender.required' => 'Sender name is required.',
            'subject.required' => 'Subject is required.',
            'category_id.required' => 'Mail category is required.',
            'category_id.exists' => 'Selected mail category is invalid.',
            'type_id.required' => 'Mail type is required.',
            'type_id.exists' => 'Selected mail type is invalid.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status must be pending, processed, or archived.',
            'received_by.required' => 'Employee who received the mail is required.',
            'received_by.exists' => 'Selected employee is invalid.',
        ];
    }
}