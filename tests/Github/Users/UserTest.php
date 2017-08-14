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
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testBaseCase()
    {
        $github = new Application(['token' => '']);
        echo $github->user->token;
    }
}