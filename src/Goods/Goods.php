<?php

namespace Dataoke\Goods;

use SDK\Kernel\BaseClient;

class Goods extends BaseClient
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
    public function getGoodsList(int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/goods/get-goods-list', $query);
    }

    /**
     * 单品详情
     *
     * @param $id
     *
     * @link http://www.dataoke.com/pmc/api-d.html?id=8
     *
     * @return array
     */
    public function getGoodsDetails($id)
    {
        return $this->httpGet('api/goods/get-goods-details', [
            'goodsId' => $id,
        ]);
    }

    /**
     * 定时拉取
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
    public function pullGoodsByTime(int $page = 1, int $perPage = 20, ?string $start = null, ?string $end = null, array $query = [])
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
     * 商品更新
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
    public function getNewestGoods(int $page = 1, int $perPage = 20, ?string $start = null, ?string $end = null, array $query = [])
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
     * 失效商品
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
    public function getStaleGoodsByTime(int $page = 1, int $perPage = 20, ?string $start = null, ?string $end = null, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'startTime' => $start,
            'endTime' => $end,
        ];

        return $this->httpGet('api/goods/get-stale-goods-by-time', $query);
    }

    /**
     * 大淘客搜索
     *
     * @param string $keyword
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=9
     *
     * @return array
     */
    public function getDtkSearchGoods(string $keyword, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'keyWords' => $keyword,
        ];

        return $this->httpGet('api/goods/get-dtk-search-goods', $query);
    }

    /**
     * 京东一元购
     *
     * @param int $subsidy
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=40
     *
     * @return array
     */
    public function jdOneDollarPurchase($subsidy = 3, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'sort' => 0,
            'subsidy' => $subsidy,
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/goods/jd-one-dollar-purchase', $query);
    }
}