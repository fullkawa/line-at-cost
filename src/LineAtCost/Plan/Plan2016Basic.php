<?php
namespace LineAtCost\Plan;

/**
 * ベーシックプラン
 * [プラン・料金 - LINE@でファン獲得！無料アプリで簡単に始めるビジネスLINE](https://at.line.me/jp/plan)より
 *
 * @author furukawa
 */
class Plan2016Basic extends Plan2016
{
    public function estimate($usages)
    {
        return 5000; // 税込5,400円
    }
}

