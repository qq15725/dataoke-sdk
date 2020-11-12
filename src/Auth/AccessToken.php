<?php

namespace Dataoke\Auth;

use SDK\Kernel\AccessToken as BaseAccessToken;

class AccessToken extends BaseAccessToken
{
    protected function appendQuery($query): array
    {
        return array_merge($query = array_merge($query, [
            'appKey' => $this->app->config->get('appkey'),
            'version' => $this->app->config->get('version'),
        ]), [
            'sign' => $this->sign($query),
        ]);
    }

    protected function sign($data): string
    {
        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= '&' . $k . '=' . $v;
        }
        $str = trim($str, '&');
        $sign = strtoupper(md5($str . '&key=' . $this->app->config->get('appsecret')));
        return $sign;
    }
}