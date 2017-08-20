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
        // print_r($user);
        $this->assertTrue($user['id'] > 0);
    }

    public function testFollowersCase()
    {
        $users = $this->github->user->mFollowers;
        if (count($users) > 0) {
            $this->assertTrue($users[0]->id > 0);
        }
        $this->assertTrue($this->github->user->followers > 0);
    }

    public function testFollowingCase()
    {
        $users = $this->github->user->mFollowing;
        if (count($users) > 0) {
            $this->assertTrue($users[0]->id > 0);
        }
        $this->assertTrue($this->github->user->following > 0);
    }

    public function testReposCase()
    {
        $repos = $this->github->user->mRepos;
        if (count($repos) > 0) {
            $this->assertTrue($repos[0]->id > 0);
            $this->assertTrue($repos[0]->owner->id > 0);
        }
    }
}