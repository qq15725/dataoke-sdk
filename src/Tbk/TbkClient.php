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

    /**
     * 官方活动推广
     *
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=24
     *
     * @return array
     */
    public function getActivities(int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('/api/category/get-tb-topic-list', $query);
    }
}