<?php

namespace Dataoke\Tbk;

use SDK\Kernel\BaseClient;

class TbkClient extends BaseClient
{
    /**
     * 高效转链
     *
     * @param $goodsId
     * @param null $couponId
     * @param string|null $pid
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=7
     *
     * @return array
     */
    public function getPrivilegeLink($goodsId, $couponId = null, string $pid = null, $query = [])
    {
        $query += [
            'goodsId' => $goodsId,
            'couponId' => $couponId,
            'pid' => $pid,
        ];

        return $this->httpGet('api/tb-service/get-privilege-link', $query);
    }
}