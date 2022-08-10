<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ProjectUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function project () {
        return $this->belongsTo(Project::class);
    }
    public function bills () {
        return $this->hasMany(Bill::class);
    }

    //userProject一覧表示
    public function getUserProject ($userId) {
        try {
            $data = $this->where('user_id', $userId)->with('project.owner', 'bills')->get();
            $arrangeData = [];
            //請求金額はbillのallCostを足せば良い
            //単価はproject_userのunit_priceで良い
            foreach ($data as $key => $value) {
                //billのmonth_all_costの合計
                $allCost = 0;
                $allOtherCost = 0;
                foreach ($value['bills'] as $key => $bill) {
                    $allCost += $bill['month_all_cost'];
                    $allOtherCost += $bill['month_other_cost'];
                };
                //billのmonth_operating_timeの合計
                $operatingTime = 0;
                foreach ($value['bills'] as $key => $bill) {
                    $operatingTime += $bill['month_operating_time'];
                };

                $pushData = [
                    'id' => $value['project']['id'],
                    'owner_name' => $value['project']['owner']['name'], //取引先
                    'name' => $value['project']['name'], //プロジェクト名
                    'unit_price' => $value['unit_price'], //単価
                    'month_operating_time' =>  $operatingTime,//稼働時間(合計)
                    'all_cost' => $allCost + $allOtherCost, //請求金額(合計)
                    'bill_send_date' => $value['bill_send_date'], //請求書送付日
                    'user_expired_date' => $value['user_expired_date'], //契約終了日
                    'contract_pdf_path' => $value['contract_pdf_path'],
                    'project_user_id' => $value['id'],
                    'join_project' => $value['join_project'] //baclogで設定中のプロジェクト
                ];
                $arrangeData[] = $pushData;
            }
            return $arrangeData;
        } catch(\Exception $e) {
            Log::info('Modelで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    public function updateJoinProject ($id, $join_project) {
        try {
            $updateData = $this->where('id', $id)->update(['join_project' => $join_project]);
            return $updateData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
