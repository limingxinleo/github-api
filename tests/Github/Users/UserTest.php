<?php
// +----------------------------------------------------------------------
// | Users.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Github\Users;

use limx\Github\Application;
use Tests\Github\Base;

class UserTest extends Base
{
    public function testBaseCase()
    {
        $github = new Application(['token' => $this->token]);
        $user = $github->user->result;
        print_r($user);
    }
}