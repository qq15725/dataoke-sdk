<?php

namespace Dataoke\Category;

use SDK\Kernel\BaseClient;

class Category extends BaseClient
{
    /**
     * 超级分类
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=10
     *
     * @return array
     */
    public function getSuperCategory()
    {
        return $this->httpGet('api/category/get-super-category');
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
    public function getTbTopicList(int $page = 1, int $perPage = 20, array $query = [])
    {
        $query += [
            'pageId' => $page,
            'pageSize' => $perPage,
        ];

        return $this->httpGet('api/category/get-tb-topic-list', $query);
    }
}