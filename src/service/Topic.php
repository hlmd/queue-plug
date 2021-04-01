<?php


namespace queue\service;

/**
 * Class Topic
 * @method create(string $instance_id, int $msg_type, string $topic, string $remark = '') 创建Topic
 * @method delete(string $instance_id, string $topic) 删除Topic
 * @method viewTopicSub(string $instance_id, string $topic) Topic订阅组
 * @method setTopicModel(string $instance_id, string $topic, int $perm) 修改Topic的读写模式
 * @method getTopicDataList(string $instance_id, int $page = 1, int $size = 10) Topic列表
 * @method getTopicMsgTotal(string $instance_id, string $topic) Topic信息状态
 * @method syncTopicDataList(string $instance_id) 同步所有Topic
 * @package queue\service
 */
class Topic extends Base
{
    protected $app_type = 'topic';

    /**
     * 创建Topic
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

    /**
     * Topic订阅组
     * @param string $instance_id 实例id
     * @param string $topic Topic名称
     */
    protected $viewTopicSub = [
        'instance_id',
        'topic',
    ];

    /**
     * 修改Topic的读写模式
     * @param string $instance_id 实例id
     * @param string $topic Topic名称
     * @param int $perm 读写模式
     */
    protected $setTopicModel = [
        'instance_id',
        'topic',
        'perm'
    ];

    /**
     * Topic列表
     * @param string $instance_id 实例id
     * @param int $page 页码
     * @param int $size 条数
     */
    protected $getTopicDataList = [
        'instance_id',
        'page' => 1,
        'size' => 10
    ];

    /**
     * Topic信息状态
     * @param string $instance_id 实例id
     * @param string $topic Topic名称
     */
    protected $getTopicMsgTotal = [
        'instance_id',
        'topic',
    ];

    /**
     * 同步所有Topic
     * @param string $instance_id 实例id
     */
    protected $syncTopicDataList = [
        'instance_id'
    ];

}