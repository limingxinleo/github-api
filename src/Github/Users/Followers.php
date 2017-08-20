<?php
// +----------------------------------------------------------------------
// | Followers.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\Github\Users;

use limx\Github\Utils\Curl;

class Followers
{
    public $result = [];

    public $api;

    public function __construct($followersUrl, $token)
    {
        $this->token = $token;
        $this->api = $followersUrl;

        $this->result = Curl::get($this->api, $token);
    }
}