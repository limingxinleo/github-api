<?php
// +----------------------------------------------------------------------
// | User.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\Github\Users;

use limx\Github\Utils\Curl;
use limx\Support\Str;

class User
{
    public $result = [];

    public $login;

    public $api = 'https://api.github.com/users';

    public function __construct($result)
    {
        $this->result = $result;
        $this->login = $result['login'];
    }

    public function __get($key)
    {
        $methods = [
            'followers', 'following', 'starred', 'repos'
        ];
        if (in_array($key, $methods)) {
            $method = $key;
            return $this->$method();
        }
        return $this->result[$key];
    }

    public function followers()
    {
        $url = sprintf("%s/%s/followers", $this->api, $this->login);
        $res = Curl::get($url);
        $result = [];
        foreach ($res as $user) {
            $result[] = new static($user);
        }
        return $result;
    }

    public function following()
    {
        $url = sprintf("%s/%s/following", $this->api, $this->login);
        $res = Curl::get($url);
        $result = [];
        foreach ($res as $user) {
            $result[] = new static($user);
        }
        return $result;
    }

    // public function __call($name, $arguments)
    // {
    //     if (Str::endsWith($name, 'FromCallback')) {
    //         $action = Str::substr($name, 0, Str::length($name) - 12);
    //         print_r($action);
    //         exit;
    //         return $this->get();
    //     }
    // }
    //
    // public function get($action)
    // {
    //     $url = sprintf("%s/%s/%s", $this->api, $this->login, $action);
    // }
}