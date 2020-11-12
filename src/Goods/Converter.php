<?php

namespace Dataoke\Goods;

use SDK\Kernel\Support\Collection;

class Converter
{
    public static function convert(array $raw): array
    {
        $data = new Collection($raw);

        $couponUrl = $data->get('couponLink');
        $matchs = [];
        preg_match('#activityId=(\w+)#', $couponUrl, $matchs);
        $couponId = $matchs[1] ?? null;
        preg_match('#sellerId=(\w+)#', $couponUrl, $matchs);
        $shopId = $matchs[1] ?? null;
        $productId = $data->get('goodsId');

        return [
            'product' => [
                'id' => $productId,
                'shop_id' => $shopId,
                'category_id' => $data->get('tbcid'),
                'title' => $data->get('title'),
                'short_title' => $data->get('dtitle'),
                'desc' => $data->get('desc'),
                'cover' => $data->get('mainPic'),
                'banners' => array_values(
                    array_filter(
                        $data->has('imgs')
                            ? explode(',', $data->get('imgs'))
                            : []
                    )
                ),
                'sales_count' => (int)$data->get('monthSales'),
                'rich_text_images' => ($data->has('detailPics')
                    ? json_decode($data->get('detailPics'), JSON_UNESCAPED_UNICODE)
                    : null) ?: [],
                'url' => $data->get('itemLink'),
            ],
            'coupon_product' => [
                'price' => (float)$data->get('actualPrice'),
                'original_price' => (float)$data->get('originalPrice'),
                'commission_rate' => (float)$data->get('commissionRate'),
                'commission_amount' => (float)bcmul(
                    (float)$data->get('actualPrice'),
                    bcdiv(
                        (float)$data->get('commissionRate'),
                        100,
                        2
                    ),
                    2
                ),
            ],
            'coupon' => [
                'id' => $couponId,
                'shop_id' => $shopId,
                'product_id' => $productId,
                'amount' => (float)$data->get('couponPrice'),
                'rule_text' => $data->get('couponConditions'),
                'stock' => $data->has('couponRemainCount') ?
                    (int)$data->has('couponRemainCount')
                    : (int)$data->get('couponTotalNum') - (int)$data->get('couponReceiveNum'),
                'total' => (int)$data->get('couponTotalNum'),
                'started_at' => $data->get('couponStartTime'),
                'ended_at' => $data->get('couponEndTime'),
                'url' => $couponUrl,
                'raw' => $raw,
            ],
            'shop' => [
                'id' => $shopId,
                'logo' => $data->get('shopLogo'),
                'name' => $data->get('shopName'),
                'type' => $data->get('shopType') == 1 ? 'tmall' : 'taobao',
            ]
        ];
    }
}