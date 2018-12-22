<?php
namespace LineAtCost\Plan;

use LineAtCost\Exception\InvalidUsageException;

/**
 * フリープラン
 * [【重要】LINE@サービス統合のお知らせ](http://blog-at.line.me/archives/52626249.html)より
 *
 * @author furukawa
 */
class Plan2019Free extends Plan2019
{
    const MESSAGE_COUNT_LIMIT = 1000;

    protected function getAmount()
    {
        return 0;
    }

    protected function getMessageCost($message_count)
    {
        if ($message_count > self::MESSAGE_COUNT_LIMIT) {
            throw new InvalidUsageException('Over message limit');
        }
        return 0;
    }
}

