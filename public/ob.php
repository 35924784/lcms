<?php
/**
 * Created by PhpStorm.
 * User: springmobi-mac
 * Date: 2018/12/3
 * Time: 8:11 PM
 */

// 先定义两个接口，点烟的人，就是你，闻到香烟的室友
interface CigaretteSmeller
{
    public function smell(CigaretteSmoker $smoker, $cigarette);
}

interface CigaretteSmoker
{
    public function nearBy(CigaretteSmeller $smeller);
    public function noLongerNearBy(CigaretteSmeller $smeller);
    public function lightUp($cigarette);
}

// 给故事里的人都起个名字，定义一个说话的方法
class Person implements CigaretteSmoker, CigaretteSmeller
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->observers = new \SplObjectStorage();
    }

    public function says($phrase)
    {
        print "{$this->name} 说: \t\"" . $phrase . "\"" . PHP_EOL;
    }

    // 实现接口中的 nearBy 方法
    public function nearBy(CigaretteSmeller $smeller)
    {
        $smellers = func_get_args();
        foreach ($smellers as $smeller) {
            $this->observers->attach($smeller);
        }
    }

    // 实现接口中的 noLongerNearBy 方法
    public function noLongerNearBy(CigaretteSmeller $smeller)
    {
        $smellers = func_get_args();
        foreach ($smellers as $smeller) {
            $this->observers->detach($smeller);
        }
    }

    // 实现接口中的 lightUp 方法，你一点着香烟附近的室友就靠过来
    public function lightUp($cigarette)
    {
        print "--- {$this->name} lightUp {$cigarette} ---" . PHP_EOL;
        foreach ($this->observers as $observer) {
            $observer->smell($this, $cigarette);
        }
    }
    // 实现接口中的 smell 方法
    public function smell(CigaretteSmoker $smoker, $cigarette)
    {
        $this->says("擦，我闻到了{$cigarette}的味道");
    }

}

$you = new Person('你');
$wang = new Person('小王');
$li = new Person('小李');
$jian = new Person('小贱');

$you->nearBy($wang, $li, $jian);
$you->lightUp('芙蓉王');
$you->says('握草，一帮畜生，我先来一口');

$you->noLongerNearBy($wang, $li, $jian);
$you->lightUp('芙蓉王');
$you->says("麻蛋，幸亏还剩一根中华，哈哈");
