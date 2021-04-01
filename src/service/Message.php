<?php


namespace queue\service;

/**
 * Class Message
 * @method create(string $instance_id, int $msg_type, string $topic, string $remark = '') 创建
 * @method delete(string $instance_id, string $topic) 删除
 * @package queue\service
 */
class Message extends Base
{
    protected $app_type = 'message';

    /**
     * 创建
     * @param string $instance_id 实例id
     * @param int $msg_type 消息类型
     * @param string $topic Topic名称
     * @param string $remark Topic备注
     */
    protected $create = [
        'instance_id',
        'msg_type',
        'topic',
        'remark' => ''
    ];

    /**
     * 删除Topic
     * @param string $instance_id 实例id
     * @param string $topic Topic名称
     */
    protected $delete = [
        'instance_id',
        'topic',
    ];



}