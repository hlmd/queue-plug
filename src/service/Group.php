<?php


namespace queue\service;

/**
 * Class Group
 * @method create(string $instance_id, string $group_id, string $group_type = 'tcp', string $remark = '') 创建
 * @method delete(string $instance_id, string $group_id) 删除
 * @method getGroupList(string $instance_id, string $group_type = 'tcp') 列表
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
        'group_type' => 'tcp',
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



}