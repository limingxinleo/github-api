<?php
// +----------------------------------------------------------------------
// | bootstrap.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
define('ROOT_PATH', __DIR__ . '/..');

$token = include_once 'token.php';
define('GITHUB_TOKEN', $token);

require __DIR__ . '/../vendor/autoload.php';
