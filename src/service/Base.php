<?php


namespace queue\service;


use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use queue\unit\Constant;
use queue\unit\Signature;
use queue\unit\Str;

class Base
{
    protected $base_url = '';
    protected $url_prefix = '';
    protected $app_type = '';
    protected $secret = '';
    protected $key = '';
    protected $method = '';
    protected $data = [];
    protected $request_time;

    /**
     * Base constructor.
     * @param string $base_url 请求地址
     * @param string $key 平台key
     * @param string $secret 密匙
     */
    public function __construct(string $base_url, string $key, string $secret)
    {
        $this->base_url = $base_url;
        $this->key = $key;
        $this->secret = $secret;
        $this->request_time = time();
    }

    /**
     * 调用方法
     * @param string $method
     * @param array $args
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function __call(string $method, array $args)
    {
        if (!property_exists($this, $method) || property_exists(Base::class, $method)) {
            throw new Exception($method . '() Method does not exist');
        }
        if (is_string($this->$method)) {
            if (!property_exists($this, $this->$method)) {
                throw new Exception($method . '() Method does not exist');
            }
            return call_user_func_array([$this, $this->$method], $args);
        }
        $data = [];
        $i = 0;
        foreach ($this->$method as $key => $value) {
            if (is_int($key) && !isset($args[$i])) {
                throw new Exception('Missing parameters: ' . $value);
            } else if (is_string($key)) {
                if (!isset($args[$i])) {
                    $data[$key] = $value;
                } else {
                    $data[$key] = $args[$i];
                }
            } else {
                $data[$value] = $args[$i];
            }
            $i++;
        }
        $this->data = $data;
        $this->method = $method;
        return $this->send();
    }

    /**
     * 设置请求时间
     * @param $time
     * @return $this
     */
    public function setRequestTime($time): Base
    {
        $this->request_time = $time;
        return $this;
    }

    /**
     * 设置平台Key
     * @param $key
     * @return $this
     */
    public function setPlatformKey($key): Base
    {
        $this->key = $key;
        return $this;
    }

    /**
     * 发送消息
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function send()
    {
        if (empty($this->method)) {
            throw new Exception('请选择方法');
        }
        $http_client = new HttpClient();
        $header = [
            Constant::HEADER_PLATFORM_KEY => $this->key,
            Constant::HEADER_REQUEST_TIME => $this->request_time,
            Constant::HEADER_SIGN => Signature::sign($this->data, $this->secret, $this->key, $this->request_time, Constant::SIGN_SEPARATOR),
        ];
        $response = $http_client->post($this->base_url . $this->url_prefix . '/' . Str::studly($this->app_type) . '/' . $this->method, [
            'headers' => $header,
            'json' => $this->data
        ])->getBody()->getContents();
        return json_decode($response, true);
    }
}