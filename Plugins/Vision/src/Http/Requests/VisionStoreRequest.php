<?php

namespace Vision\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisionStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:5|max:255",
            "wish_title" => "required",
            "wish_amount" => "required",
            "date_type" => "nullable",
            "will_achieve_at" => "required|date",
            "prices" => "required|array",
            "prices.*.title" => "required",
            "prices.*.description" => "nullable",
            "prices.*.order" => "nullable",
            "plans" => "required|array",
            "plans.*.title" => "required",
            "plans.*.description" => "nullable",
            "plans.*.order" => "nullable",
        ];
    }
}
