<?php
return array(
    // 开启路由
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'pk' => '/index.php/Index/compare',
    ),

    /* 模板相关配置 */
    'TMPL_PARSE_STRING' => array(
        '__IMG__'    => __ROOT__ . '/Public/' . MODULE_NAME  . '/img',
        '__CSS__'    => __ROOT__ . '/Public/' . MODULE_NAME  . '/css',
        '__JS__'     => __ROOT__ . '/Public/' . MODULE_NAME  . '/js',
        '__STATIC__'    => __ROOT__ . '/Public/Static',
    ),
);