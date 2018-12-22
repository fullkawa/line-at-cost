<?php
namespace LineAtCost\Plan;

use LineAtCost\Exception\InvalidUsageException;

/**
 * スタンダードプラン
 * [【重要】LINE@サービス統合のお知らせ](http://blog-at.line.me/archives/52626249.html)より
 *
 * @author furukawa
 */
class Plan2019Standard extends Plan2019
{
    const FREE_MESSAGES = 45000; // メッセージ配信数(無料分)

    /**
     * [追加メッセージ配信数が100万通を超えた時の単価を教えてください。](http://blog-at.line.me/archives/52743423.html#100%E4%B8%87%E9%80%9A%E3%82%AA%E3%83%BC%E3%83%90%E3%83%BC%E5%8D%98%E4%BE%A1)
     * @var integer
     */
    const MAX_ADDITIONAL_MESSAGES = 1000000;

    private $additional_message_costs; // 追加メッセージ料金テーブル

    public function __construct()
    {
        $this->additional_message_costs = [
            ['cap_messages' =>   50000, 'cost' => 3.0],
            ['cap_messages' =>  100000, 'cost' => 2.8],
            ['cap_messages' =>  200000, 'cost' => 2.6],
            ['cap_messages' =>  300000, 'cost' => 2.4],
            ['cap_messages' =>  400000, 'cost' => 2.2],
            ['cap_messages' =>  500000, 'cost' => 2.0],
            ['cap_messages' =>  600000, 'cost' => 1.9],
            ['cap_messages' =>  700000, 'cost' => 1.8],
            ['cap_messages' =>  800000, 'cost' => 1.7],
            ['cap_messages' =>  900000, 'cost' => 1.6],
            ['cap_messages' => 1000000, 'cost' => 1.5],
        ];
    }

    protected function getAmount()
    {
        return 15000;
    }

    protected function getMessageCost($message_count)
    {
        $cost = 0;
        if ($message_count <= self::FREE_MESSAGES) {
            return $cost;
        }
        if ($message_count > self::MAX_ADDITIONAL_MESSAGES) {
            throw new InvalidUsageException('See http://blog-at.line.me/archives/52743423.html#100%E4%B8%87%E9%80%9A%E3%82%AA%E3%83%BC%E3%83%90%E3%83%BC%E5%8D%98%E4%BE%A1');
        }
        $additional_count = $message_count - self::FREE_MESSAGES;
        $prev_target_count = 0;
        foreach($this->additional_message_costs as $level) {
            $target_count = min([
                ($level['cap_messages'] - $prev_target_count),
                $additional_count
            ]);
            $cost += ceil($target_count * $level['cost']); // FIXME:端数をどう処理するのか、LINE@公式情報なし
            $additional_count -= $target_count;
            if ($additional_count <= 0) {
                break;
            }
            $prev_target_count = $level['cap_messages'];
        }
        return intval($cost);
    }
}

