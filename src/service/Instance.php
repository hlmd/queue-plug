<?php


namespace queue\service;

/**
 * Class Instance
 * @method array list() 获取实例列表
 * @method array create(string $instance_name, string $remark = '') 创建实例
 * @method array update(int $id, string $instance_name, string $remark = '') 修改实例
 * @method array info(int $id) 实例信息
 * @method array delete(int $id) 删除实例
 * @method array asyncAll() 同步所有实例
 * @method array async(int $id) 同步实例
 * @package queue\service
 */
class Instance extends Base
{
    protected $app_type = 'instance';

    /**
     * 获取实例列表
     */
    protected $list = [];

    /**
     * 创建实例
     * @param string $instance_name 实例名称
     * @param string $remark 实例备注
     */
    protected $create = [
        'instance_name',
        'remark' => ''
    ];

    /**
     * 修改实例
     * @param string $id 实例id
     * @param string $instance_name 实例名称
     * @param string $remark 实例备注
     */
    protected $update = [
        'id',
        'instance_name',
        'remark' => ''
    ];

    /**
     * 实例信息
     * @param string $id 实例id
     */
    protected $info = [
        'id'
    ];

    /**
     * 删除实例
     * @param int $id 实例id
     */
    protected $delete = [
        'id'
    ];

    /**
     * 同步所有实例
     */
    protected $asyncAll = [];

    /**
     * 同步实例
     * @param int $id 实例id
     */
    protected $async = [
        'id'
    ];

}