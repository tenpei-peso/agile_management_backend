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
            // '*.order' => ['required', 'integer'],
            '*.ticket' => ['required','integer'],
            // '*.start_time' =>['required'],
            // '*.finish_time' =>['required'],
            // '*.rest_time' => ['required'],
            // '*.working_time'=> ['required', 'integer'],
            // '*.expense'=> ['required', 'integer'],
            // '*.unit_price'=> ['integer'],
            // '*.remark'=> ['required', 'string'],
            // '*.project_user_id' => ['required', 'integer'],
            // '*.year_month_day' => ['required', 'date_format:Y-m-d'],
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
        ], 411);
        throw new HttpResponseException($response);
    }
}
