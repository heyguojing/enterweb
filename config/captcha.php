<?php
// 验证码配置
return [
    'codeSet'   => '123456789qwertyuiopasdfghjklzxcvbnm',
    'expir'     => 1800,
    'fontSize'  => 20,
    // 是否画混淆曲线
    'useCurve' => false,
    // 是否添加杂点
    'useNoise'  => true,
    // 验证成功后是否重置
    'reset'     => true,
    'length'    => 4,
    'imageW'    => 150,
    'imageH'    => 50,
];