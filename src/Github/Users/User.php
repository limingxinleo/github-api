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

    public function __construct($token)
    {
        $this->token = $token;
        $this->result = Curl::get('https://api.github.com/user', $token);
    }
}