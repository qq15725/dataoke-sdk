<?php

namespace Dataoke\TbService;

use SDK\Kernel\BaseClient;

class TbService extends BaseClient
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
     * 淘系万能解析
     *
     * @param string $content
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=33
     *
     * @return array
     */
    public function parseContent(string $content)
    {
        return $this->httpGet('api/tb-service/parse-content', [
            'content' => $content,
        ]);
    }

    /**
     * 联盟搜索
     *
     * @param string $keyword
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=13
     *
     * @return array
     */
    public function getTbService(string $keyword, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'keyWords' => $keyword,
        ];

        return $this->httpGet('api/tb-service/get-tb-service', $query);
    }

    /**
     * 订单查询接口
     *
     * @param int $page
     * @param int $perPage
     * @param string|null $startTime
     * @param string|null $endTime
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=27
     *
     * @return array
     */
    public function getOrderDetails(int $page = 1, int $perPage = 20, ?string $startTime = null, ?string $endTime = null, array $query = [])
    {
        $query += [
            'startTime' => $startTime ?: date('Y-m-d H:i:s', time() - 3600 * 3),
            'endTime' => $endTime ?: date('Y-m-d H:i:s'),
            'pageId' => $page,
            'pageSize' => $perPage,
            'queryType' => 1,
        ];

        return $this->httpGet('api/tb-service/get-order-details', $query);
    }

    /**
     * 品牌库
     *
     * @param int $page
     * @param int $perPage
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=17
     *
     * @return array
     */
    public function getBrandList(int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/tb-service/get-brand-list', $query);
    }
}