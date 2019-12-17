<?php
require_once "vendor/autoload.php";

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->setHosts(array("http://127.0.0.1"))->build();


$param = array(
    "index" => "test_php",
    "body" => array(
        "settings" => [
            "number_of_shards" => 2,
            "number_of_replicas" => 1
        ],
        "mappings" => [
            "properties" => [
                "group_id" => [
                    "type" => "integer"
                ],
                "name" => [
                    "analyzer" => "smartcn",
                    "type" => "text"
                ],
                "answer" => [
                    "analyzer" => "smartcn",
                    "type" => "text"
                ],
                "single" => [
                    "type" => "integer"
                ],
                "link_table" => [
                    "type" => "keyword"
                ],
                "status" => [
                    "type" => "integer"
                ],
                "template_id" => [
                    "type" => "integer"
                ],
                "created_at" => [
                    "type" => "date"
                ],
                "updated_at" => [
                    "type" => "integer"
                ],
                "words" => [
                    "type" => "integer"
                ]
            ]
        ]
    ),
);

//判断索引是否存在，不存在则创建
$exist = $client->indices()->exists(array(
    "index" => "test_php",
));
if (!$exist) {
    $response = $client->indices()->create($param);
    if ($response['acknowledged'] != true) {
        echo "创建索引失败!!!";
        die;
    }
}


//初始化一组数据
$data = array(
    1 => array(
        "group_id" => 1,
        "name" => "如何领取奖励",
        "answer" => "公众号领取，应用内签到",
        "single" => 1,
        "link_table" => "",
        "status" => 1,
        "template_id" => 1,
        "created_at" => "2019-12-11",
        "updated_at" => 1000,
        "words" => 2500
    ),
    2 => array(
        "group_id" => 1,
        "name" => "老师演示了integer和date，那其他的类型聚合本地测试报非法参数异常illegal_argument_exception",
        "answer" => "兄嘚，这种情况要看具体问题了，问问题，报了什么错，要贴出来啊，老师演示没问题，基本就是你的问题了",
        "single" => 1,
        "link_table" => "",
        "status" => 1,
        "template_id" => 1,
        "created_at" => "2019-12-12",
        "updated_at" => 2000,
        "words" => 1500
    ),
    3 => array(
        "group_id" => 1,
        "name" => "elasticsearch中,索引类似于database,类型类似于table;那么 一个索引下可以有多个类型吧?",
        "answer" => "好好学习多多思考",
        "single" => 1,
        "link_table" => "",
        "status" => 1,
        "template_id" => 1,
        "created_at" => "2019-12-12",
        "updated_at" => 4000,
        "words" => 2500
    ),
    4 => array(
        "group_id" => 1,
        "name" => "请问录制视频用的是什么软件",
        "answer" => "Mac自带QuickTime Player",
        "single" => 1,
        "link_table" => "",
        "status" => 1,
        "template_id" => 1,
        "created_at" => "2019-12-13",
        "updated_at" => 3000,
        "words" => 3500
    )
);
foreach ($data as $id => $item) {
    AddDoc($id, $item, $client);
}


function AddDoc($id, $data, $client)
{
    $params = [
        'index' => 'test_php',
        'id' => $id,
        'body' => $data,
    ];
    $response = $client->index($params);
    var_dump($response);
}

function GetAll($client) {
    $params = [
        'index' => 'test_php',
        'type' => '_doc',
        'body' => []
    ];
    $response = $client->search($params);
    var_dump($response);
}

