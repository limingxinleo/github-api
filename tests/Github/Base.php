<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Github;

use PHPUnit\Framework\TestCase;
use limx\Github\Application;

abstract class Base extends TestCase
{
    protected $token = GITHUB_TOKEN;
    protected $github;

    public function __construct()
    {
        $this->github = new Application(['token' => $this->token]);
    }
}