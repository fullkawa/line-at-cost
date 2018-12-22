<?php
namespace LineAtCost\Plan;

/**
 * 2016共通ロジック
 * [プラン・料金 - LINE@でファン獲得！無料アプリで簡単に始めるビジネスLINE](https://at.line.me/jp/plan)より
 *
 * @author furukawa
 */
abstract class Plan2016 extends Plan
{
    private $amount; // 月額利用料金(税別)

    public function estimate($usages)
    {
        return $this->amount;
    }
}

