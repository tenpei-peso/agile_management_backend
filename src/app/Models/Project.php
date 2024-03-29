<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function owner () {
        return $this->belongsTo(Owner::class);
    }

    public function bills () {
        return $this->hasMany(Bill::class);
    }

    public function users () {
        return $this->belongsToMany(User::class, 'project_users');
    }

    public function roles () {
        return $this->hasMany(Role::class);
    }

    //オーナーのプロジェクト一覧画面表示
    public function getOwnerProject ($owner_id) {
        try {
            //現在の月の請求書のデータとってくる
            $projectListData = $this->where('owner_id', $owner_id)
            ->with(['bills' => function($query) {
                //現在の月とってくる
                $date = Carbon::parse('now');
                $nowYearMonth = $date->format('Y-m');
                $query->where('year_month', $nowYearMonth);
            }])->get();

            $arrangeData = [];

            foreach ($projectListData as $key => $list) {
                //全メンバーの今月の稼働時間*単価＊経費
                $all_member_month_all_cost = 0;
                //全メンバーの今月の稼働時間
                $all_member_month_operating_time = 0;
                foreach ($list['bills'] as $key => $bill) {
                    if(empty($bill)) {
                        $all_member_month_all_cost = 0;
                        $all_member_month_operating_time = 0;
                    } else {
                        $all_member_month_all_cost += $bill['month_all_cost'];
                        $all_member_month_operating_time +=  $bill['month_operating_time'];
                    }
                };

                $pushData = [
                    'id' => $list['id'],
                    'owner_id' => $list['owner_id'],
                    'project_name' => $list['project_name'], //プロジェクト名
                    'dead_line' => $list['dead_line'], //納期
                    'all_operating_time' => $all_member_month_operating_time, //現状工数(月)
                    'expected_all_operating_time' =>  $list['expected_all_operating_time'],//予測工数(月)
                    'earning' => $list['earning'], //最新売上（月）
                    'earning_year_month' => $list['earning_year_month'], //最新売上（月）の年月
                    'all_cost' => $all_member_month_all_cost, //最新経費（月）
                    'contract_expired_date' => $list['contract_expired_date'], //契約更新日
                    'remark' => $list['remark'], //課題
                ];
                $arrangeData[] = $pushData;
            }
            return $arrangeData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナープロジェクト一覧画面のユーザーの画像取得
    public function getMemberPath ($owner_id) {
        try {
            $pathData = $this->where('owner_id', $owner_id)->with(['users:photo_path,name,id'])->get();
            $arrangeData = [];

            foreach ($pathData as $key => $path) {

                $pushData = [
                    'pathData' => $path['users']
                ];
                $arrangeData[] = $pushData;
            };
            return $arrangeData;
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナープロジェクト作成
    public function createOwnerProject ($request) {
        try {
            $createData = $this->create($request);
            return [
                "status" => 200,
                "message" => "作成に成功しました"
            ];
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }

    //オーナープロジェクト編集
    public function updateOwnerProject ($request, $projectId) {
        unset($request['project_id']);
        try {
            $this->where('id', $projectId)->update($request);
            return [
                'status' => 200,
                'message' => '編集に成功しました'
            ];
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
