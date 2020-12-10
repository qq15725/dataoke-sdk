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

    /**
     * 淘系万能解析
     *
     * @param string $content
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=33
     *
     * @return array
     */
    public function parse(string $content)
    {
        return $this->httpGet('/api/tb-service/parse-content', [
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
    public function search(string $keyword, int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
            'keyWords' => $keyword,
        ];

        return $this->httpGet('/api/tb-service/get-tb-service', $query);
    }
}