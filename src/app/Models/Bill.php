<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use App\Models\ProjectUser;

class Bill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUserBills ($userId) {
        try {
            $allData = ProjectUser::where('user_id', $userId)->with('project.owner', 'bills')->get();
            $arrangeData = [];
            foreach ($allData as $key => $data) {
                foreach ($data['bills'] as $key => $bill) {
                    $pushData = [
                        'year_month' => $bill['year_month'], //請求年月
                        'owner_name' => $data['project']['owner']['name'], //取引先
                        'name' => $data['project']['name'], //プロジェクト名
                        'unit_price' => $bill['unit_price'], //billsの単価
                        'month_operating_time' => $bill['month_operating_time'],//稼働時間(合計)
                        'month_other_cost' => $bill['month_other_cost'], //諸経費
                        'month_all_cost' => $bill['month_all_cost'], //請求金額(合計)
                    ];
                    $arrangeData[] = $pushData;
                }
            }
            return $arrangeData;
        } catch(\Exception $e) {
            Log::info('Modelで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
