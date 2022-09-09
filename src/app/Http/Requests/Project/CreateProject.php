<?php

namespace App\Http\Requests\Project;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProject extends FormRequest
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
            'owner_id' => ['required', 'integer'],
            'project_name' => ['required', 'string'],
            'dead_line' => ['required', 'date'],
            'expected_all_operating_time' => ['required', 'integer'],
            'earning' => ['integer'],
            'earning_year_month' => ['date'],
            'contract_expired_date' => ['required', 'date'],
            'remark' => ['string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attributeを入力してください。',
            'integer' => ':attributeを正しく入力してください。',
            'string' => ':attributeを正しく入力してください。',
            'max' => ':attributeは:max文字以内で入力してください。',
            'date' => ':attributeは日付で入力してください',
        ];
    }

    public function attributes()
    {
        return [
            'owner_id' => 'ownerId',
            'project_name'   => 'プロジェクト名',
            'dead_line'    => '納期',
            'expected_all_operating_time'    => '１ヶ月の予測工数',
            'earning'    => '１ヶ月の売上',
            'earning_year_month'    => '売り上げの振り込み日',
            'contract_expired_date'    => '契約更新日',
            'remark'    => '課題',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400, //jsonの返事の中身のエラー番号
            'errors' => $validator->errors(),
        ],400); //実際に送られるresponse codeが400番 これが無いと、jsonでエラーメッセージは返ってくるけど送れらてくるのは200番のstatusOKとくる。

        //例外を知らせる。
        //throw new 例外クラス名（例外message）
        throw new HttpResponseException($response);
    }
}
