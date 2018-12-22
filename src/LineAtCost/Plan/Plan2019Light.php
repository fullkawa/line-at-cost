<?php
namespace LineAtCost\Plan;

/**
 * ライトプラン
 * [【重要】LINE@サービス統合のお知らせ](http://blog-at.line.me/archives/52626249.html)より
 *
 * @author furukawa
 */
class Plan2019Light extends Plan2019
{
    const FREE_MESSAGES = 15000; // メッセージ配信数(無料分)

    const ADDITIONAL_MESSAGE_COST = 5; // 追加メッセージ料金 5円/1通

    protected function getAmount()
    {
        return 5000;
    }

    protected function getMessageCost($message_count)
    {
        if ($message_count <= self::FREE_MESSAGES) {
            return 0;
        }
        return ($message_count - self::FREE_MESSAGES) * self::ADDITIONAL_MESSAGE_COST;
    }
}

