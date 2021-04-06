<?php

namespace queue;

use Exception;
use queue\service\Base;
use queue\service\Group;
use queue\service\Instance;
use queue\service\Message;
use queue\service\Topic;

/**
 * Class Queue
 * @method static Instance Instance(string $base_url = '', string $key = '', string $secret = '') 实例
 * @method static Topic       Topic(string $base_url = '', string $key = '', string $secret = '') Topic
 * @method static Group       Group(string $base_url = '', string $key = '', string $secret = '') Group
 * @method static Message   Message(string $base_url = '', string $key = '', string $secret = '') Message
 * @package queue
 */
class Queue
{
    /**
     * @param $name
     * @param $arguments
     * @return Base
     * @throws Exception
     */
    public static function __callStatic($name, $arguments): Base
    {
        // TODO: Implement __callStatic() method.
        $service = 'queue\\service\\' . $name;
        $config = self::getConfig($arguments);
        return new $service(...$config);
    }

    /**
     * 获取配置
     * @param $config
     * @return array
     * @throws Exception
     */
    public static function getConfig($config): array
    {
        if ($config) return $config;
        if (function_exists('root_path')) {
            $path = root_path() . 'extend';
        } else {
            $path = __DIR__ . '/../../../../extend';
        }
        $file_path = $path . '/queue.php';
        if (is_dir($path) && is_file($file_path)) {
            $config = require $file_path;
            if (!isset($config['base_url']) || !isset($config['key']) || !isset($config['secret'])) {
                throw new Exception('CODE:84002 配置有误!');
            }
            return [
                $config['base_url'],
                $config['key'],
                $config['secret'],
            ];
        } else {
            throw new Exception('CODE:84001 缺少配置!');
        }
    }
}