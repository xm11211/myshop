<?php
namespace app\admin\controller;
use app\admin\controller\Base;
class Index extends Base{
    public function index() {
        $date = realDate();
        $arr = updateWeather();
        $rtWeather = getRealWeather();
        $plUrl = url('index');
        $this->assign(array(
            'date' => $date,
            'rtWeather' => $rtWeather,
            'weaSk' => $arr['weaSk'],
            'weaFu' => $arr['weaFu'],
            'weaTo' => $arr['weaTo'],
            'plName' => '控制台',
            'slName' => '查看',
            'plUrl' => $plUrl
        ));
        return view();
    }
    public function updateRealWea() {
        updateRealWeather();
    }
}
