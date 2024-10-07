<?php

namespace App\Consts;

class SampleDeliverySettings
{

    //  補足1: 以下のサンプルデータは、配送日を計算する際に使用する設定値です。
    //　今回はサンプルデータをハードコードしていますが、
    //　実際の業務ではモデルを作成し、データベースから取得する事を想定しています。

    //  補足2: 本来であれば、管理者が設定画面で配送日に関する設定を行い、変更を保存した際に
    //  DBにデータが保存されると同時にバリデーションが走るはずですので、
    //　ここではバリデーションを既に通過したものと仮定して、サンプルデータを定義しています。

    //  補足3: もし設定画面でバリデーションを行うとしたら、以下の様に設定するつもりです。
    //  ・最短配送日は0以上の整数
    //  ・表示日数は1以上の整数で、最大14日
    //  ・15時以降の遅延は真偽値
    //  ・土日を除外するかどうかは真偽値
    //  ・都道府県ごとの遅延日数は、都道府県名をキー、遅延日数を値とする連想配列
    //  ・都道府県ごとの遅延日数はの値は、0以上の整数

    public const SAMPLE_DELIVERY_SETTINGS = [
        'sample1' => [
            'earliest_delivery_date' => 2,
            'display_days' => 7,
            'after_3pm_delay' => true,
            'exclude_weekends' => true,
            'prefecture_delays' => [
                '沖縄県' => 3,
                '北海道' => 3,
            ],
        ],
        'sample2' => [
            'earliest_delivery_date' => 1,
            'display_days' => 5,
            'after_3pm_delay' => false,
            'exclude_weekends' => false,
            'prefecture_delays' => [
                '青森県' => 2,
                '北海道' => 3,
            ],
        ],
        'sample3' => [
            'earliest_delivery_date' => 0,
            'display_days' => 8,
            'after_3pm_delay' => true,
            'exclude_weekends' => false,
            'prefecture_delays' => [
                '沖縄県' => 3,
                '鹿児島' => 2,
            ],
        ],
        'sample4' => [
            'earliest_delivery_date' => 0,
            'display_days' => 10,
            'after_3pm_delay' => false,
            'exclude_weekends' => true,
            'prefecture_delays' => [
                '沖縄県' => 3,
                '宮崎県' => 2,
            ],
        ]
    ];
}