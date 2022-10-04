<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Composer\DependencyResolver\Request;

class Bill extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getBillPdf ($billData) {
        try {
            $requiredPdfData = [
                // 請求書番号 billNumber
                // 請求書作成日 year_monthとbill_send_dateを合わせる
                // 会社名
                // 自分の名前
                // unit_price
                // 労働時間
                // 単価*労働時間
                // 経費
                // 全部の合計
                // 消費税
                // 消費税と合計金額
            ]; 

            $pdf = Pdf::loadView('pdf_sample', ['billData' => $requiredPdfData]);
            return $pdf->download('pdf_sample.pdf');
        } catch (\Exception $e) {
            Log::emergency($e->getMessage());
            throw $e;
        }
    }
}
