<?php


namespace queue\service;

use queue\unit\Constant;

/**
 * Class Group
 * @method create(string $instance_id, string $group_id, string $group_type = Constant::GROUP_TYPE_TCP, string $remark = '') 创建
 * @method delete(string $instance_id, string $group_id) 删除
 * @method getGroupList(string $instance_id, string $group_type = Constant::GROUP_TYPE_TCP, int $page = 1, int $size = 10) 列表
 * @method syncGroupList(string $instance_id, string $group_type = Constant::GROUP_TYPE_TCP, string $group_id = '') 同步所有Group
 * @method getGroupSubDetail(string $instance_id, string $group_id) Group订阅的Topic
 * @method setGroupConsumerUpdate(string $instance_id, string $group_id, int $read_enable) 设置消息读取权限
 * @package queue\service
 */
class Group extends Base
{
    protected $app_type = 'group';

    /**
     * 创建
     * @param string $instance_id 实例id
     * @param string $group_id Group Id
     * @param string $group_type 协议
     * @param string $remark Topic备注
     */
    protected $create = [
        'instance_id',
        'group_id',
        'group_type' => Constant::GROUP_TYPE_TCP,
        'remark' => ''
    ];

    /**
     * 删除Topic
     * @param string $instance_id 实例id
     * @param string $group_id GroupId
     */
    protected $delete = [
        'instance_id',
        'group_id',
    ];

    /**
     * 列表
     * @param string $instance_id 实例id
     * @param string $group_type 协议
     * @param int $page 页数
     * @param int $size 条数
     */
    protected $getGroupList = [
        'instance_id',
        'group_type' => Constant::GROUP_TYPE_TCP,
        'page' => 1,
        'size' => 10
    ];

    /**
     * 同步所有Group
     * @param string $instance_id 实例id
     * @param string $group_type 协议
     * @param string $group_id GroupId
     */
    protected $syncGroupList = [
        'instance_id',
        'group_type' => Constant::GROUP_TYPE_TCP,
        'group_id' => '',
    ];

    /**
     * Group订阅的Topic
     * @param string $instance_id 实例id
     * @param string $group_id Group Id
     */
    protected $getGroupSubDetail = [
        'instance_id',
        'group_id'
    ];

    /**
     * 设置消息读取权限
     * @param string $instance_id 实例id
     * @param string $group_id Group Id
     * @param int $read_enable 1开启 0关闭
     */
    protected $setGroupConsumerUpdate = [
        'instance_id',
        'group_id',
        'read_enable'
    ];

}