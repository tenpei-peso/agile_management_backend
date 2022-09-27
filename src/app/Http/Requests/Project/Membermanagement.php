<?php

namespace App\Http\Requests\Project;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Membermanagement extends FormRequest

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
                'unit_price' => ['integer'],
                'expected_operating_time' => ['integer'],
            ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'integer' => ':attributeを正しく入力してください。',
            'string' => ':attributeを正しく入力してください。',
            'date' => ':attributeは日付で入力してください',
            'array' => ':attributeは正しい形で入力してください'
        ];
    }

    public function attributes()
    {
        return [
            'roles' => '役割',
            'unit_price' => '単価',
            'expected_operating_time' => '予定工数',
            'bill_send_date'    => '請求書送付日',
            'user_contract_date' => '契約開始日',
            'user_expired_date' => '契約更新日',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400, //jsonの返事の中身のエラー番号
            'errors' => $validator->errors(),
        ],401); //実際に送られるresponse codeが400番 これが無いと、jsonでエラーメッセージは返ってくるけど送れらてくるのは200番のstatusOKとくる。

        //例外を知らせる。
        //throw new 例外クラス名（例外message）
        throw new HttpResponseException($response);
    }
}
