<?php
namespace LineAtCost\Plan;

/**
 * プロプラン
 * [プラン・料金 - LINE@でファン獲得！無料アプリで簡単に始めるビジネスLINE](https://at.line.me/jp/plan)より
 *
 * @author furukawa
 */
class Plan2016Pro extends Plan2016
{
    public function estimate($usages)
    {
        return 20000; // 税込21,600円
    }
}

