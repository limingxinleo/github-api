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

    public $api = 'https://api.github.com/user';

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function __get($key)
    {
        $method = [
            'followers', 'following', 'starred', 'repos'
        ];
        if (in_array($key, $method)) {
            $url = $this->result[$key . '_url'];
            $res = Curl::get($url);
            $result = [];

            foreach ($res as $item) {
                if ($key == 'followers' || $key = 'following') {
                    $result[] = new static($item);
                }
            }

            return $result;
        }
        return $this->result[$key];
    }
}