<?php

namespace Dataoke\Dels\Jd\Kit;

use SDK\Kernel\BaseClient;

class Kit extends BaseClient
{
    /**
     * 京东商品转链
     *
     * @param $materialId
     * @param $unionId
     * @param array $query
     *
     * @link http://www.dataoke.com/kfpt/api-d.html?id=52
     *
     * @return array
     */
    public function promotionUnionConvert($materialId, $unionId, array $query = [])
    {
        $query += [
            'materialId' => $materialId,
            'unionId' => $unionId,
        ];

        return $this->httpGet('api/dels/jd/kit/promotion-union-convert', $query);
    }
}