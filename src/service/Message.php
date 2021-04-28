<?php


namespace queue\service;

/**
 * Class Message
 * @method producerOrder(string $instance_id, string $topic, string $callback_url, mixed $message_body) 生产
 * @method messageSend(string $instance_id, string $topic, $message, string $key) 发送消息到服务端
 * @method messagePush(string $instance_id, string $topic, string $group_id, string $client_id, string $msg_id) 向指定的消费者推送消息
 * @method messagePageQueryByTopic(string $instance_id, string $topic, int $begin_time, int $end_time, string $task_id = '', int $current_page = 1, int $page_size = 20) 查询Topic的所有消息
 * @method messageGetByKey(string $instance_id, string $topic, string $key) 模糊查询消息信息列表
 * @method consumerGetConnection(string $instance_id, string $group_id) 查询GroupId客户端的连接情况
 * @method messageTrace(string $instance_id, string $topic, string $msg_id) 判断消息是否曾被消费过
 * @method messageGetByMsgId(string $instance_id, string $topic, string $msg_id) 查询消息的信息
 * @method traceQueryByMsgKey(string $instance_id, string $topic, string $msg_key, int $begin_time, int $end_time) 创建轨迹查询任务
 * @method traceGetResult(string $query_id) 获取轨迹查询结果
 * @method getMsg(string $message_id) 获取消息是否进入队列消费消息
 * @package queue\service
 */
class Message extends Base
{
    protected $app_type = 'message';

    /**
     * 查询Topic的所有消息
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param int $begin_time 查询范围的起始时间戳，单位：毫秒
     * @param int $end_time 查询范围的终止时间戳，单位：毫秒
     * @param string $task_id 查询任务的ID，首次查询不需要输入，后续取消息必须传入，根据前一次的返回结果取出该字段
     * @param int $current_page 当前取第几页消息，从1开始递增，最大值为50，取消息时不可超过最大页数
     * @param int $page_size 分页查询，每页最多显示消息数量，默认是20，最小5条，最多50条
     */
    protected $messagePageQueryByTopic = [
        'instance_id',
        'topic',
        'begin_time',
        'end_time',
        'task_id' => '',
        'current_page' => 1,
        'page_size' => 20
    ];

    /**
     * 模糊查询消息信息列表
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $key
     */
    protected $messageGetByKey = [
        'instance_id',
        'topic',
        'key',
    ];

    /**
     * 查询GroupId客户端的连接情况
     * @param string $instance_id 实例id
     * @param string $group_id GroupId
     */
    protected $consumerGetConnection = [
        'instance_id',
        'group_id',
    ];

    /**
     * 发送消息到服务端
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param mixed $message 消息内容
     * @param string $key 消息Key
     */
    protected $messageSend = [
        'instance_id',
        'topic',
        'message',
        'key'
    ];

    /**
     * 生产
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $callback_url 回调地址
     * @param mixed $message_body 携带参数
     */
    protected $producerOrder = [
        'instance_id',
        'topic',
        'callback_url',
        'message_body'
    ];

    /**
     * 获取消息是否进入队列消费消息
     * @param string $message_id message_id
     */
    protected $getMsg = [
        'message_id',
    ];

    /**
     * 判断消息是否曾被消费过
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $msg_id MsgId
     */
    protected $messageTrace = [
        'instance_id',
        'topic',
        'msg_id'
    ];

    /**
     * 查询消息的信息
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $msg_id MsgId
     */
    protected $messageGetByMsgId = [
        'instance_id',
        'topic',
        'msg_id'
    ];

    /**
     * 向指定的消费者推送消息
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $group_id GroupId
     * @param string $client_id ClientId
     * @param string $msg_id MsgId
     */
    protected $messagePush = [
        'instance_id',
        'topic',
        'group_id',
        'client_id',
        'msg_id',
    ];

    /**
     * 创建轨迹查询任务
     * @param string $instance_id 实例id
     * @param string $topic Topic
     * @param string $msg_key MsgKey
     * @param int $begin_time
     * @param int $end_time
     */
    protected $traceQueryByMsgKey = [
        'instance_id',
        'topic',
        'msg_key',
        'begin_time',
        'end_time',
    ];

    /**
     * 获取轨迹查询结果
     * @param string $query_id 查询id
     */
    protected $traceGetResult = [
        'query_id'
    ];


}