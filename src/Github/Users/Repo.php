<?php
// +----------------------------------------------------------------------
// | Repo.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\Github\Users;

use limx\Github\Utils\Curl;

class Repo
{
    public $result;

    public function __construct($repo)
    {
        $this->result = $repo;
    }

    public function __get($name)
    {
        if (isset($this->result[$name])) {
            return $this->result[$name];
        }

        $methods = [
            'mOwner'
        ];
        if (in_array($name, $methods)) {
            return $this->$name();
        }

        return null;
    }

    public function mOwner()
    {
        return new User($this->result['owner']);
    }
}