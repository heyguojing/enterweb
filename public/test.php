<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
<?php
    echo '<h3>字符转转数组</h3>';
    $str = 'php linux apach mysql is pretty good';
    
    $arr = explode(" ",$str);
    print_r('<pre>');
    print_r($arr);

    echo '<h3>数组转字符串</h3>';
    $arrs = array(
        array(
            'name' => 'Ming',
            'id' => '1',
            'sex' => 'male',
            'interests' => array(
                'ball',
                'drive',
                'sing'
            ),
            'eating' => 'chicken'
        ),
        array(
            'name' => 'Ming',
            'id' => '2',
            'sex' => 'male',
            'interests' => array(
                'ball',
                'drive',
                'sing'
            ),
            'eating' => 'chicken'
        ),
        array(
            'name' => 'Ming',
            'id' => '3',
            'sex' => 'male',
            'interests' => array(
                'ball',
                'drive',
                'sing' => '薛之谦'
            ),
            'eating' => 'chicken'
        )
    );
    print_r('<pre>');
    // print_r($arrs);
    echo ($arrs[2]['interests']['sing']);
    // foreach($arrs as $k => $v){
    //     if(isset($arrs[$v])){
    //         foreach($v as $k1 => $v1){
    //             echo ($v1.'<br>');
    //         }
    //     }
    // }
?>
<p>json</p>
<?php
    echo '<h3>json操作数据</h3>';
    $json = '{
        "name": "Min",
        "id": 1,
        "isphp": true,
        "skill": [{
                "php": "study"
            },
            {
                "javascript": [
                    "function",
                    "array",
                    "object"
                ]
            },
            {
                "vue.js": "so terrible"
            },
            {
                "thinkphp": "study"
            },
            "github"
        ],
        "interests": [{
            "game": [
                "chicken",
                "lol",
                "剑三"
            ],
            "exeicise": [{
                    "running": "park",
                    "playing": "basketball"
                },
                "swing",
                "listener"
            ]
        }]
    }';
    print_r(json_decode($json,1));

?>
<p>数组</p>
<?php
    $arr = array(
        "name" => "php",
        "id" => 1,
        "study" => array(
            "php",
            "javacsript",
            "thinkphp"
        ),
        "other" => array(
            "eating" => "chicken",
            "元素女皇" => "奇亚娜",
            "皮城女警" => "凯特琳",
        )
    );
    echo (json_encode($arr));
?>
<p>数组操作函数</p>
<?php
    $arrd = array(
        array(
            "id" => 1,
            "name" => "Ming1",
            "isphp" => true
        ),
        array(
            "id" => 2,
            "name" => "Ming2",
            "isphp" => true
        ),
        array(
            "id" => 3,
            "name" => "Ming3",
            "isphp" => true
        ),
    );
    print_r('<pre>');
    print_r(array_column($arrd,'name'));
    
?>
<p>array_merge()函数（PHP 4+）：把一个或多个数组合并成一个数组：</p>
<p>implode()函数（PHP 4+）：把数组元素转化成字符串</p>
<p>array_keys(PHP4+)：返回数组的所有键或键的子集</p>
<p>array_column()函数（PHP 5.5+）：返回输入数组中某个单一列的值：</p>
<p>unset()（PHP4+）:销毁指定的变量</p>
<p>empty()（PHP4+）:判断一个变量是否为空</p>

<p>strpos(str_origin,str_find,start(可选))</p>
<p>substr(string,start,length) eg:echo substr("Hello world",0,10)</p>
<p>trim()函数（PHP 4+）：移除字符串两侧的空白字符或者预定义字符</p>
<p>in_array()（PHP 4+）：搜索数组中是否存在指定值，若存在返回true，否则返回false。 in_array("Mark", $people)</p>
<p>str_replace(find,replace,string,count)</p>
 <p>surstr($str,strpos($str2,""))</p>
<?php
    $str = "green";
    echo str_replace("green,pink,sdf,ddd,blue,green","replace","green,pink,sdf,ddd,blue,green");
    echo "<br>";
    echo str_replace("yellow pink purple","black","red green yellow pink purple",$count); 
    echo "count".$count; 
?>
<p>substr(strpos())</p>
<?php
    $str = "green,pink,sdf,ddd,blue,green,sdsd,dsdsdds";
    echo substr($str,strpos($str,"blue"),5);
?>
</body>
</html>
