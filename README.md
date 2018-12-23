# line-at-cost

[![Build Status](https://travis-ci.org/fullkawa/line-at-cost.svg?branch=master)](https://travis-ci.org/fullkawa/line-at-cost)

Line@ cost(not including tax) estimating library

日本語ドキュメントを希望する方は[こちら](https://qiita.com/fullkawa/items/20b1790a9991996a91ea)をご覧ください。


## Installation

`composer require fullkawa/line-at-cost`


## Usage

### For current plan

```
use LineAtCost\PlanFactory;
use LineAtCost\Estimator;

$factory = new PlanFactory();

$plan_free = $factory->getInstance(1); // Free plan
$cost_free = Estimator::estimate($plan_free);
$this->assertEquals(0, $cost_free);

$plan_basic = $factory->getInstance(2); // Basic plan
$cost_basic = Estimator::estimate($plan_basic);
$this->assertEquals(5000, $cost_basic);

$plan_pro = $factory->getInstance(4); // Pro plan
$cost_pro = Estimator::estimate($plan_pro);
$this->assertEquals(30000, $cost_pro);
```

### For 2019 spring~ plan

```
use LineAtCost\PlanFactory;
use LineAtCost\Estimator;

$factory = new PlanFactory(PlanFactory::TARGET_2019);

$plan_free = $factory->getInstance(1); // Free plan
$usages_free = ['message_count' => 1000];
$cost_free = Estimator::estimate($plan_free, $usages_free);
$this->assertEquals(0, $cost_free);

$plan_light = $factory->getInstance(2); // Light plan
$usages_light = ['message_count' => 16000];
$cost_light = Estimator::estimate($plan_light, $usages_light);
$this->assertEquals(10000, $cost_light);

$plan_standard = $factory->getInstance(3); // Standard plan
$usages_standard = ['message_count' => 145000];
$cost_standard = Estimator::estimate($plan_standard, $usages_standard);
$this->assertEquals(305000, $cost_standard);
```

### Other usage

```
use LineAtCost\PlanFactory;
use LineAtCost\Estimator;

$factory = new PlanFactory(PlanFactory::TARGET_ALL);

$plan_2016free = $factory->getInstance(PlanFactory::PLAN2016FREE_ID);
$cost_2016free = Estimator::estimate($plan_2016free);
$this->assertEquals(0, $cost_2016free);

$plan_2019light = $factory->getInstance(PlanFactory::PLAN2019LIGHT_ID);
$usages_2019light = ['message_count' => 16000];
$cost_2019light = Estimator::estimate($plan_2019light, $usages_2019light);
$this->assertEquals(10000, $cost_2019light);
```


## Reference

```
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
    const PLAN2016PRO_ID = 13; // プロ(月額21,600円(税込))
    const PLAN2016PRO2_ID = 14; // プロ(月額32,400円(税込))
    const PLAN2016DEVELOPER_ID = 19; // Developer Trial

    /**
     * 2019年春からの料金プランのみ
     * @var integer
     */
    const TARGET_2019 = 20;

    const PLAN2019FREE_ID = 21; // フリー
    const PLAN2019LIGHT_ID = 22; // ライト
    const PLAN2019STANDARD_ID = 23; // スタンダード
```
