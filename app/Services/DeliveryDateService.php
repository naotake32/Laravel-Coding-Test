<?php
// コントローラーの肥大化を防ぐため、配送日を計算するロジックをサービスクラスに切り出す
namespace App\Services;

use Carbon\Carbon;

class DeliveryDateService
{
    public function calculateDeliveryDates($settings, $orderTime, $prefecture)
    {
        $startDate = Carbon::now();

        // 最短日数の分だけ現在の日付に加算する処理
        $startDate->addDays($settings['earliest_delivery_date']);

        // 15時以降の注文は翌日にシフト
        if ($settings['after_3pm_delay'] && $orderTime-> hour >= 15) {
            $startDate->addDay();
        }

        // 特定の都道府県が遅延予定地域に設定されている場合、遅延日数を加算
        if (isset($settings['prefecture_delays'][$prefecture])) {
            $startDate->addDays($settings['prefecture_delays'][$prefecture]);
        }

        //ここまでの処理で最短の配送日が算出された為、
        //以下のコードで指定された日数分の配送日を算出する

        $deliveryDates = [];
        $dayCounter = 0;

        while(count($deliveryDates) < $settings['display_days']) {
            $currentDate = $startDate->copy()->addDays($dayCounter);

            //土日を除外する様に設定されている場合、配送日から土日を除外する
            if($settings['exclude_weekends'] && $currentDate->isWeekend()) {
                $dayCounter++; // スキップして次の日付へ
                continue;
            }

            // 配送日を追加
            $dayCounter++;
            $deliveryDates[] = $currentDate->format('Y-m-d');
        }

        return $deliveryDates;
    }
}
