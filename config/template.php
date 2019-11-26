<?php
define('ADMIN', 'static/admin');
define('HOME', 'static/home');
define('VENDOR', 'static/vendor');
define('PAGE_SIZE', 10);

define('CATE_1', 1); // 团建目的地
define('CATE_2', 2); // 团建玩法
define('CATE_3', 3); // 团建收益
define('CATE_4', 4); // 团建天数
define('CATE_5', 5); // 团建价格

return [
    'config_input_type' => [
        1 => '文本框',
        2 => '数值框',
        3 => '文本域',
        4 => '开关切换',
        5 => '富文本',
    ],

    'goods_type_list' =>[
        1 => '好评数',
        2 => '折扣',
    ],

    'goods_cate_list'=>[
        1 => '团建目的地',
        2 => '团建玩法',
        3 => '团建收益',
        4 => '团建天数',
        5 => '团建价格',
    ]
];
