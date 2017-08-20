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
        if (isset($this->result[$key])) {
            return $this->result[$key];
        }

        $methods = [
            'mFollowers', 'mFollowing', 'mStarred', 'mRepos'
        ];
        if (in_array($key, $methods)) {
            $method = $key;
            return $this->$method();
        }

        return null;
    }

    public function mFollowers()
    {
        $url = sprintf("%s/%s/followers", $this->api, $this->login);
        $res = Curl::get($url);
        $result = [];
        foreach ($res as $user) {
            $result[] = new static($user);
        }
        $this->result['mFollowers'] = $result;
        return $result;
    }

    public function mFollowing()
    {
        $url = sprintf("%s/%s/following", $this->api, $this->login);
        $res = Curl::get($url);
        $result = [];
        foreach ($res as $user) {
            $result[] = new static($user);
        }
        $this->result['mFollowing'] = $result;
        return $result;
    }

    public function mRepos()
    {
        $url = sprintf("%s/%s/repos", $this->api, $this->login);
        $res = Curl::get($url);

        $result = [];
        foreach ($res as $repo) {
            $result[] = new Repo($repo);
        }
        $this->result['mRepos'] = $result;
        return $result;
    }

    // public function

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