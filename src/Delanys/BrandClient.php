<?php

namespace Dataoke\Delanys;

use SDK\Kernel\BaseClient;

class BrandClient extends BaseClient
{
    /**
     * 品牌商品
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=44
     *
     * @param int $cid
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @return array
     */
    public function getColumnList(int $cid, int $page = 1, int $perPage = 10, array $query = [])
    {
        $query += [
            'cid' => $cid,
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/delanys/brand/get-column-list', $query);
    }

    /**
     * 单个品牌详情
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=45
     *
     * @param int $brandId
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @return array
     */
    public function getGoodsList(int $brandId, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'brandId' => $brandId,
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/delanys/brand/get-goods-list', $query);
    }
}