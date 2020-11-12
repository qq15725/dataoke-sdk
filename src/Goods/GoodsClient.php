<?php

namespace Dataoke\Goods;

use SDK\Kernel\BaseClient;

class GoodsClient extends BaseClient
{
    /**
     * 商品列表
     *
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=5
     *
     * @return array
     */
    public function list(int $page = 1, int $perPage = 100, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/goods/get-goods-list', $query);
    }

    /**
     * 商品详情
     *
     * @param $id
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=8
     *
     * @return array
     */
    public function find($id)
    {
        return $this->httpGet('api/goods/get-goods-details', [
            'goodsId' => $id,
        ]);
    }

    /**
     * 新增商品列表
     *
     * @param int $page
     * @param int $perPage
     * @param string|null $start
     * @param string|null $end
     * @param array $query
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=12
     *
     * @return array
     */
    public function createdList(int $page = 1, int $perPage = 100, ?string $start = null, ?string $end = null, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'startTime' => $start,
            'endTime' => $end,
        ];

        return $this->httpGet('api/goods/pull-goods-by-time', $query);
    }

    /**
     * 更新商品列表
     *
     * @param int $page
     * @param int $perPage
     * @param string $start
     * @param string $end
     * @param array $query
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=3
     *
     * @return array
     */
    public function updatedList(int $page = 1, int $perPage = 100, ?string $start = null, ?string $end = null, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'startTime' => $start,
            'endTime' => $end,
        ];

        return $this->httpGet('api/goods/get-newest-goods', $query);
    }

    /**
     * 删除商品列表
     *
     * @param int $page
     * @param int $perPage
     * @param string|null $start
     * @param string|null $end
     * @param array $query
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=11
     *
     * @return array
     */
    public function deletedList(int $page = 1, int $perPage = 100, ?string $start = null, ?string $end = null, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'startTime' => $start,
            'endTime' => $end,
        ];

        return $this->httpGet('api/goods/get-stale-goods-by-time', $query);
    }
}