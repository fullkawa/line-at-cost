<?php
namespace LineAtCost\Plan;

/**
 * LINE@ 料金プラン
 *
 * 継承するクラスの名称は基本的に、"Plan"＋その料金体系が始まる年＋プラン名とする。
 * 例) Plan2016Free = 2016年7月から始まった料金体系のフリープラン
 *
 * @author furukawa
 */
abstract class Plan
{
    abstract public function estimate($usages);
}

