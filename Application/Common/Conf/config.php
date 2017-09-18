<?php
return array(
	//'配置项'=>'配置值'

    /* 数据库配置 */
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'mytp', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'mt_', // 数据库表前缀

    //号美配置
    'DRS' => array(
        'WORKSPACE_ID' => '66a342ea-3ada-4db6-a326-776f48016cd3',  //工作组id
        'REPORT_ID' => '56a10b34-da55-46f2-b73b-562778247375',   //报表id
        'WORKSPACE_NAME' => 'Xmei',  //工作组名称
        'PB_KEY' => 'FS0IoVUrTQhL1dQVhnYz0rGiG79QOXr4v+pLLGJNsHXPcTFvAun2wXv0XOTpl4lhOwvsAFpiQPrYRh1NbURKDw==',   //访问密钥
        'TOKEN_EXPIRE' => 3600*24,   //token过期时间
        //PB 签名算法
        'PB_ALGO' => 'HS256',
    ),
    'HAOMEI' => array(
        'WORKSPACE_ID' => '66a342ea-3ada-4db6-a326-776f48016cd3',  //工作组id
        'REPORT_ID' => '8a9df039-6554-43d6-9659-82ecd0906ae6',   //报表id
        'WORKSPACE_NAME' => 'Xmei',  //工作组名称
        'PB_KEY' => 'FS0IoVUrTQhL1dQVhnYz0rGiG79QOXr4v+pLLGJNsHXPcTFvAun2wXv0XOTpl4lhOwvsAFpiQPrYRh1NbURKDw==',   //访问密钥
        'TOKEN_EXPIRE' => 3600*24,   //token过期时间
        //PB 签名算法
        'PB_ALGO' => 'HS256',
    ),

    //投美配置
    'TOUMEI' => array(
        'WORKSPACE_ID' => '5e1f1199-d524-4796-9a9f-12fbe7c64615',  //工作组id
        'REPORT_ID' => '4e32ad15-08e1-459a-ad25-98a50604e19b',   //报表id
        'WORKSPACE_NAME' => 'toumei',  //工作组名称
        'PB_KEY' => 'aig//W90etnZcfGodxlfrzEeKf8HBdUX1gN5yczZjxmJSpEich66UPCjCAiLZDOY5ApbhznGeR5rO4Lo2HS9kg==',   //访问密钥
        'TOKEN_EXPIRE' => 3600*24,   //token过期时间
        //PB 签名算法
        'PB_ALGO' => 'HS256',
    ),

    // 海量取数据接口true为正式地址
    'HYLANDA_API_NORMAL' => false,
    'HYLANDA_API_TEST'=>'http://api-v3.hylanda.com/api.php',//测试环境地址
    'HYLANDA_API_ONLINE'=>'http://api-v3-internal.hylanda.com/api.php', //线上环境使用地址

);