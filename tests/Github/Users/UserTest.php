<?php
// +----------------------------------------------------------------------
// | Users.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Github\Users;

use Tests\Github\Base;

class UserTest extends Base
{
    public function testBaseCase()
    {
        $user = $this->github->user->result;
        $this->assertTrue($user['id'] > 0);
    }

    public function testFollowersCase()
    {
        $followers = $this->github->user->followers;
        foreach ($followers as $follower) {
            $this->assertTrue($follower->id > 0);
        }
    }

    public function testFollowingCase()
    {
        $users = $this->github->user->following;
        foreach ($users as $user) {
            $this->assertTrue($user->id > 0);
        }
    }
}