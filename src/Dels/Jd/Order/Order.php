<?php

namespace Dataoke\Dels\Jd\Order;

use SDK\Kernel\BaseClient;

class Order extends BaseClient
{
    /**
     * 京东订单查询
     *
     * @param string $key
     * @param int $page
     * @param int $perPage
     * @param string|null $startTime
     * @param string|null $endTime
     * @param int $type
     * @param array $query
     *
     * @link https://www.dataoke.com/kfpt/api-d.html?id=51
     *
     * @return array
     */
    public function getOfficialOrderList(
        string $key,
        int $page = 1,
        int $perPage = 20,
        ?string $startTime = null,
        ?string $endTime = null,
        int $type = 1,
        array $query = []
    )
    {
        $query += [
            'key' => $key,
            'pageNo' => $page,
            'pageSize' => $perPage,
            'startTime' => $startTime = $startTime ?: date('Y-m-d H:i:s', time() - 3600),
            'endTime' => $endTime ?: date('Y-m-d H:i:s', strtotime($startTime) + 3600),
            'type' => $type,
        ];

        return $this->httpGet('api/dels/jd/order/get-official-order-list', $query);
    }
}