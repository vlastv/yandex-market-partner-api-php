# OpenAPI\Client\StocksApi

All URIs are relative to https://api.partner.market.yandex.ru, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getActualStocks()**](StocksApi.md#getActualStocks) | **GET** /campaigns/{campaignId}/warehouses/{warehouseId}/stocks/actual | Запрос информации об остатках |
| [**updateStocks()**](StocksApi.md#updateStocks) | **PUT** /campaigns/{campaignId}/offers/stocks | Передача информации об остатках |


## `getActualStocks()`

```php
getActualStocks($campaign_id, $warehouse_id, $sku): \OpenAPI\Client\Model\CampaignsCampaignIdWarehousesWarehouseIdStocksActual
```

Запрос информации об остатках

{% note warning %}  29 мая 2023 года — последний день, когда на Маркете можно оформить и обработать заказ с внешней площадки.  С 30 мая работать с такими заказами станет нельзя.  {% endnote %}  Запрашивает актуальную информацию по остаткам товаров на складе Маркета.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$warehouse_id = 56; // int | Идентификатор склада.
$sku = array('sku_example'); // string[] | Фильтр по SKU

try {
    $result = $apiInstance->getActualStocks($campaign_id, $warehouse_id, $sku);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->getActualStocks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **warehouse_id** | **int**| Идентификатор склада. | |
| **sku** | [**string[]**](../Model/string.md)| Фильтр по SKU | [optional] |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdWarehousesWarehouseIdStocksActual**](../Model/CampaignsCampaignIdWarehousesWarehouseIdStocksActual.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateStocks()`

```php
updateStocks($campaign_id, $body): \OpenAPI\Client\Model\CampaignsCampaignIdOffersStocks
```

Передача информации об остатках

Передает данные об остатках товаров на витрине. В одном запросе можно передать от одного до 2000 товаров, в минуту можно передать не более 500 запросов.  Обязательно указывайте SKU **в точности** так, как он указан в каталоге. Например, _557722_ и _0557722_ — это два разных SKU.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\StocksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$body = new \OpenAPI\Client\Model\CampaignsCampaignIdOffersStocks(); // \OpenAPI\Client\Model\CampaignsCampaignIdOffersStocks

try {
    $result = $apiInstance->updateStocks($campaign_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StocksApi->updateStocks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **body** | **\OpenAPI\Client\Model\CampaignsCampaignIdOffersStocks**|  | |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdOffersStocks**](../Model/CampaignsCampaignIdOffersStocks.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
