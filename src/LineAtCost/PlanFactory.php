<?php
namespace LineAtCost;

/**
 * Planインスタンス ファクトリ
 *
 * @author furukawa
 */
class PlanFactory
{
    const TARGET_ALL = 0;

    /**
     * 2016年6月からの料金プランのみ
     * @var integer
     */
    const TARGET_2016 = 10;

    const PLAN2016FREE_ID = 11; // フリー
    const PLAN2016BASIC_ID = 12; // ベーシック
    const PLAN2016PRO_ID = 13; // プロ(月額21,600円)
    const PLAN2016PRO2_ID = 14; // プロ(月額32,400円)
    const PLAN2016DEVELOPER_ID = 19; // Developer Trial

    /**
     * 2019年春からの料金プランのみ
     * @var integer
     */
    const TARGET_2019 = 20;

    const PLAN2019FREE_ID = 21; // フリー
    const PLAN2019LIGHT_ID = 22; // ライト
    const PLAN2019STANDARD_ID = 23; // スタンダード

    private $target_base;

    /**
     * コンストラクタ
     *
     * @param int $target 特定の料金体系に限定する場合、TARGET_*を指定する。
     */
    public function __construct($target = PlanFactory::TARGET_2016)
    {
        $this->target_base = $target;
    }

    public function getInstance($plan_id)
    {
        return null;
    }
}

