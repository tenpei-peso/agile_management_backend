<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TimeCardCreateRequest extends FormRequest
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
            '*.id' => ['required', 'integer'],
            '*.order' => ['required', 'integer'],
            '*.ticket' => ['string'],
            '*.start_time' =>['required', 'date_format:H:i'],
            '*.finish_time' =>['required', 'date_format:H:i'],
            '*.rest_time' => ['required', 'date_format:H:i'],
            '*.operating_time'=> ['required', 'integer'],
            '*.expense'=> ['required', 'integer'],
            '*.unit_price'=> ['required', 'integer'],
            '*.remark'=> ['required', 'string'],
            '*.project_user_id' => ['required', 'integer'],
            '*.year_month_date' => ['required', 'date_format:Y-m-d'],
            '*.data_number' => ['required'],
        ];
    }

        /**
     * バリデーションエラーが起きたら実行される
     *
     * @param Validator $validator
     *
     * @return HttpResponseException
     */
    protected function failedValidation(Validator $validator): HttpResponseException
    {
        $response = response()->json([
            'status' => 'validation error',
            'errors' => $validator->errors()
        ], 400);
        throw new HttpResponseException($response);
    }
}
