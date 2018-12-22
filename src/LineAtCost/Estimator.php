<?php
namespace LineAtCost;

/**
 * LINE@コスト見積もり
 *
 * @author furukawa
 */
class Estimator
{
    /**
     * 月額料金を見積もる
     *
     * @param $plan 料金プラン
     * @param $usages  利用状況: 利用オプション・メッセージ配信数など。詳細は各Planクラスのコメント参照
     */
    static public function estimate($plan, $usages = [])
    {
        return 0;
    }
}

