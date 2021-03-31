<?php
require 'vendor/autoload.php';

use queue\Queue;

dump($argv);

function root_path()
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
     * 创建实例
     */
    public function update()
    {
        $response = Queue::Instance()->update('实例名称2', '备注');
        dump($response);
    }


}


$app = $argv[1] ?? $_GET['app'];
$action = $argv[2] ?? $_GET['action'];

$aliyun_sms = new $app();
$aliyun_sms->$action();