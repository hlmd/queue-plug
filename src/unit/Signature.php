<?php


namespace queue\unit;


class Signature
{
    /**
     * 生成签名
     * @param $data
     * @param $secret
     * @param $platform_key
     * @param $time
     * @param string $separator
     * @return string
     */
    public static function sign($data, $secret, $platform_key, $time, $separator = ''): string
    {
        ksort($data);
        $signStr = implode($separator, array_map(function ($item){
            return is_array($item) ? json_encode($item, JSON_UNESCAPED_SLASHES) : $item;
        }, array_values($data)));
        return md5($signStr . $secret . $platform_key . $time);
    }
}