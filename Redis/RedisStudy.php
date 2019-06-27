<?php

namespace Redis;


class RedisStudy
{
    const PREFIX = 'redis_study';
    public $redis;

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1');
    }

    public function set($key, $value) {
        $this->redis->set(self::PREFIX.$key, $value);
    }

    public function get($key) {
        return $this->redis->get(self::PREFIX.$key);
    }
}