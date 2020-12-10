<p>
  <a href="https://github.com/qq15725/dataoke-sdk" target="_blank">
    <img alt="Php-Version" src="https://img.shields.io/packagist/php-v/wxm/dataoke-sdk.svg" />
  </a>
  <a href="https://github.com/qq15725/dataoke-sdk" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="https://github.com/qq15725/dataoke-sdk/graphs/commit-activity" target="_blank">
    <img alt="Maintenance" src="https://img.shields.io/badge/Maintained%3F-yes-green.svg" />
  </a>
  <a href="https://github.com/qq15725/dataoke-sdk/blob/master/LICENSE" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

大淘客 SDK, 调用简单、语义化增强。支持 Laravel/Lumen。

## 安装

```bash
composer require wxm/dataoke-sdk
```

## 使用

```php
<?php

use Dataoke\Application;

$dataoke = new Application('app_key', 'secret_key', 'v1.2.4');

// 例如 api/goods/get-goods-details, 其他接口同理
$dataoke->goods->getGoodsDetails(521383533703);
``` 

## 已封装

- api/tb-service/get-privilege-link (高效转链)
- api/tb-service/parse-content (淘系万能解析)
- api/tb-service/get-tb-service (联盟搜索)
- api/tb-service/get-order-details (订单查询接口)
- api/tb-service/get-brand-list (品牌库)
- api/goods/get-goods-list (商品列表)
- api/goods/get-goods-details (单品详情)
- api/goods/pull-goods-by-time (定时拉取)
- api/goods/get-newest-goods (商品更新)
- api/goods/get-stale-goods-by-time (失效商品)
- api/goods/get-dtk-search-goods (大淘客搜索)
- api/delanys/brand/get-column-list (品牌商品)
- api/delanys/brand/get-goods-list (单个品牌详情)
- api/category/get-super-category (超级分类)
- api/category/get-tb-topic-list (官方活动推广)