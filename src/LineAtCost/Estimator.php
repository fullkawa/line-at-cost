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
     * 月額料金(税別)を見積もる
     * (プレミアムIDオプション等の年間利用料は含まない)
     *
     * @param $plan 料金プラン
     * @param $usages  利用状況: メッセージ配信数など。詳細は各Planクラスのコメント参照
     */
    static public function estimate($plan, $usages = [])
    {
        return 0;
    }
}

