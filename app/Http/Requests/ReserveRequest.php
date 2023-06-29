<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
        return [
            'number' => 'required',
            'day' => 'required | date | after:today',
            'time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'number.required' => '人数を選択してください',
            'day.required' => '日にちを選択してください',
            'day.after:today' => '予約は明日以降にしてください',
            'time.required' => '時間を選択してください',
        ];
    }
}
