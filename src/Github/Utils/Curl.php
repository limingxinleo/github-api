<?php
// +----------------------------------------------------------------------
// | Curl.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\Github\Utils;

class Curl
{
    public static function get($url, $token, $params = null)
    {
        if (isset($params)) {
            $body = http_build_query($params);
            $url = sprintf("%s?%s", $url, $body);
        }

        $ch = curl_init();
        // 设置抓取的url
        curl_setopt($ch, CURLOPT_URL, $url);
        // 启用时会将头文件的信息作为数据流输出。
        curl_setopt($ch, CURLOPT_HEADER, false);
        // 启用时将获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // 超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        // 设置header
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: token ' . $token,
            'User-Agent: Wechat-Github-App'
        ]);

        //执行命令
        $result = curl_exec($ch);
        if ($result === false) {
            // static::logInfo($url, $params, [], curl_error($ch));
            return false;
        }
        //关闭URL请求
        curl_close($ch);
        return json_decode($result, true);
    }
}