<?php
require 'vendor/autoload.php';

use queue\Queue;
use queue\unit\Constant;

dump($argv);

/**
 * 获取项目根路径
 * @return string
 */
function root_path(): string
{
    return __DIR__ . DIRECTORY_SEPARATOR;
}

/**
 * 浏览器友好的变量输出
 * @param mixed $vars 要输出的变量
 * @return void
 */
function dump(...$vars)
{
    ob_start();
    var_dump(...$vars);

    $output = ob_get_clean();
    $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);

    if (PHP_SAPI == 'cli') {
        $output = PHP_EOL . $output . PHP_EOL;
    } else {
        if (!extension_loaded('xdebug')) {
            $output = htmlspecialchars($output, ENT_SUBSTITUTE);
        }
        $output = '<pre>' . $output . '</pre>';
    }

    echo $output;
}

/**
 * 实例
 * Class Instance
 */
class Instance
{
    /**
     * 获取实例列表
     */
    public function list()
    {
        $response = Queue::Instance()->list();
        dump($response);
    }

    /**
     * 创建实例
     */
    public function create()
    {
        $response = Queue::Instance()->create('实例名称2', '备注');
        dump($response);
    }

    /**
     * 修改实例
     */
    public function update()
    {
        $response = Queue::Instance()->update(19, '实例名称3', '备注');
        dump($response);
    }

    /**
     * 修改实例
     */
    public function info()
    {
        $response = Queue::Instance()->info(19);
        dump($response);
    }

    /**
     * 删除实例
     */
    public function delete()
    {
        $response = Queue::Instance()->delete(19);
        dump($response);
    }

    /**
     * 同步实例
     */
    public function async()
    {
        $response = Queue::Instance()->async(19);
        dump($response);
    }

    /**
     * 同步实例
     */
    public function asyncAll()
    {
        $response = Queue::Instance()->asyncAll();
        dump($response);
    }


}

/**
 * Topic
 * Class Topic
 */
class Topic
{
    /**
     * 创建Topic
     */
    public function create()
    {
        $response = Queue::Topic()->create('MQ_INST_1997661112067980_BXhPKk3X', Constant::MSG_TYPE_COMMON, 'test2', 'test2的remark');
        dump($response);
    }

    /**
     * 删除Topic
     */
    public function delete()
    {
        $response = Queue::Topic()->delete('MQ_INST_1997661112067980_BXhPKk3X', 'test2');
        dump($response);
    }

    /**
     * Topic信息状态
     */
    public function getTopicMsgTotal()
    {
        $response = Queue::Topic()->getTopicMsgTotal('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01');
        dump($response);
    }

    /**
     * Topic订阅组
     */
    public function viewTopicSub()
    {
        $response = Queue::Topic()->viewTopicSub('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01');
        dump($response);
    }

    /**
     * 修改Topic的读写模式
     */
    public function setTopicModel()
    {
        $response = Queue::Topic()->setTopicModel('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01', Constant::TOPIC_PERM_ALL);
        dump($response);
    }

    /**
     * Topic列表
     */
    public function getTopicDataList()
    {
        $response = Queue::Topic()->getTopicDataList('MQ_INST_1997661112067980_BXhPKk3X');
        dump($response);
    }

    /**
     * 同步所有Topic
     */
    public function syncTopicDataList()
    {
        $response = Queue::Topic()->syncTopicDataList('MQ_INST_1997661112067980_BXhPKk3X');
        dump($response);
    }

}

/**
 * Group
 * Class Group
 */
class Group
{
    /**
     * 创建
     */
    public function create()
    {
        $response = Queue::Group()->create('MQ_INST_1997661112067980_BXhPKk3X', 'GID_TEST_2020', Constant::GROUP_TYPE_HTTP, '我是备注');
        dump($response);
    }

    /**
     * 删除
     */
    public function delete()
    {
        $response = Queue::Group()->delete('MQ_INST_1997661112067980_BXhPKk3X', 'GID_TEST_2020');
        dump($response);
    }

    /**
     * 列表
     */
    public function getGroupList()
    {
        $response = Queue::Group()->getGroupList('MQ_INST_1997661112067980_BXhPKk3X', Constant::GROUP_TYPE_HTTP);
        dump($response);
    }

    /**
     * 同步所有Group
     */
    public function syncGroupList()
    {
        $response = Queue::Group()->syncGroupList('MQ_INST_1997661112067980_BXhPKk3X', Constant::GROUP_TYPE_HTTP);
        dump($response);
    }

    /**
     * Group订阅的Topic
     */
    public function getGroupSubDetail()
    {
        $response = Queue::Group()->getGroupSubDetail('MQ_INST_1997661112067980_BXhPKk3X', 'GID_test_10');
        dump($response);
    }

    /**
     * 设置消息读取权限
     */
    public function setGroupConsumerUpdate()
    {
        $response = Queue::Group()->setGroupConsumerUpdate('MQ_INST_1997661112067980_BXhPKk3X', 'GID_test_10', Constant::GROUP_READ_ENABLE);
        dump($response);
    }

}

class Message
{
    /**
     * 生产
     */
    public function producerOrder()
    {
        $response = Queue::Message()->producerOrder('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01', 'http://queue.ljk.com/Message/test3', ['a' => 1]);
        dump($response);
    }

    /**
     * 发送消息到服务端
     */
    public function messageSend()
    {
        $response = Queue::Message()->messageSend('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01', [
            'callback_url' => 'http://queue.ljk.com/Message/test3',
            'message_body' => [
                'a' => 1
            ]
        ], 'message_key_2021-04-02-17-13');
        dump($response);
    }

    /**
     * 向指定的消费者推送消息
     */
    public function messagePush()
    {
        $response = Queue::Message()->messagePush('MQ_INST_1997661112067980_BXhPKk3X', 'LJK_topic_test01', '****', '***', '***');
        dump($response);
    }

}


$app = $argv[1] ?? $_GET['app'];
$action = $argv[2] ?? $_GET['action'];

$aliyun_sms = new $app();
$aliyun_sms->$action();