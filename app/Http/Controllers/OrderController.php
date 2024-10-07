<?php

namespace App\Http\Controllers;

use App\Consts\SampleDeliverySettings;
use App\Services\DeliveryDateService; 
use Carbon\Carbon;

class OrderController extends Controller
{
    public function showOrderForm()
    {
        // サンプルデータを取得
        $sampleSettings = \App\Consts\SampleDeliverySettings::SAMPLE_DELIVERY_SETTINGS;


        // サンプルデータを選択
        $selectedSample = 'sample1'; // ここを 'sample2' や 'sample3' に変更してテストする。
        $settings = $sampleSettings[$selectedSample];

        // 現在時刻を取得
        $orderTime = Carbon::now(); 

        // 配送先の地域。今回はプルダウンが実装範囲なのでべた書きしていますが、
        // 実際はプルダウンで選択した都道府県のデータを取得する処理を追加で実装する必要があると考えています。
        $prefecture = '北海道'; 

        // サービスクラスを呼び出し、配送日を計算
        $deliveryDateService = new DeliveryDateService();
        $deliveryDates = $deliveryDateService->calculateDeliveryDates($settings, $orderTime, $prefecture);

        return view('order-form', ['deliveryDates' => $deliveryDates]);
    }
}