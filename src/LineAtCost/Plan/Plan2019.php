<?php
namespace LineAtCost\Plan;

use LineAtCost\Exception\InvalidUsageException;

/**
 * 2019共通ロジック
 * [【重要】LINE@サービス統合のお知らせ](http://blog-at.line.me/archives/52626249.html)より
 *
 * @author furukawa
 */
abstract class Plan2019 extends Plan
{
    // 月額利用料を取得する
    abstract protected function getAmount();

    // 追加メッセージ料金を取得する
    abstract protected function getMessageCost($message_count);

    public function estimate($usages)
    {
        $cost = $this->getAmount();

        if (array_key_exists('message_count', $usages) === false) {
            throw new InvalidUsageException('No key:message_count');
        }
        $message_count = intval($usages['message_count']);
        if ($message_count < 0) {
            throw new InvalidUsageException("Invalid message_count value:{$message_count}");
        }
        $cost += $this->getMessageCost($message_count);
        return $cost;
    }
}

