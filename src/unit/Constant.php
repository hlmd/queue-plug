<?php


namespace queue\unit;


class Constant
{
    # 请求头
    const HEADER_PLATFORM_KEY = 'platform-key';                                      # 请求平台Key
    const HEADER_REQUEST_TIME = 'request-time';                                      # 请求时间
    const HEADER_SIGN = 'sign';                                                      # 签名

    const SIGN_SEPARATOR = '|';                                                      # 签名连接符

    #消息类型
    const MSG_TYPE_COMMON     = 0;                                                   # 普通消息
    const MSG_TYPE_ZONE_ORDER = 1;                                                   # 分区顺序消息
    const MSG_TYPE_ORDER      = 2;                                                   # 全局顺序消息
    const MSG_TYPE_AFFAIR     = 4;                                                   # 事务消息
    const MSG_TYPE_TIME       = 5;                                                   # 定时/延时消息

    #Topic读写模式
    const TOPIC_PERM_BAN_READ  = 2;                                                  # 禁读
    const TOPIC_PERM_BAN_WRITE = 4;                                                  # 禁写
    const TOPIC_PERM_ALL       = 6;                                                  # 同时支持读写



}