<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BillController extends Controller
{
    //ユーザー請求書一覧
    public function getUserBills (Bill $bill, $userId) {
        try {
            $projectListData = $bill->getUserBills($userId);
            return $projectListData;
        } catch(\Exception $e) {
            Log::info('Controllerで取得できませんでした');
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
