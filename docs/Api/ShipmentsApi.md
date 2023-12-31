# OpenAPI\Client\ShipmentsApi

All URIs are relative to https://api.partner.market.yandex.ru, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**confirmShipment()**](ShipmentsApi.md#confirmShipment) | **POST** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/confirm | Подтверждение отгрузки |
| [**downloadShipmentAct()**](ShipmentsApi.md#downloadShipmentAct) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/act | Получение акта приема-передачи |
| [**downloadShipmentDiscrepancyAct()**](ShipmentsApi.md#downloadShipmentDiscrepancyAct) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/discrepancy-act | Скачать акт расхождений |
| [**downloadShipmentInboundAct()**](ShipmentsApi.md#downloadShipmentInboundAct) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/inbound-act | Скачать фактический акт приема-передачи для отгрузки |
| [**downloadShipmentReceptionTransferAct()**](ShipmentsApi.md#downloadShipmentReceptionTransferAct) | **GET** /campaigns/{campaignId}/shipments/reception-transfer-act | Подтверждение ближайшей отгрузки и получение акта приема-передачи для нее |
| [**downloadShipmentTransportationWaybill()**](ShipmentsApi.md#downloadShipmentTransportationWaybill) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/transportation-waybill | Скачать транспортную накладную |
| [**getShipment()**](ShipmentsApi.md#getShipment) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId} | Получение информации об отгрузке |
| [**getShipmentOrdersInfo()**](ShipmentsApi.md#getShipmentOrdersInfo) | **GET** /campaigns/{campaignId}/first-mile/shipments/{shipmentId}/orders/info | Получение информации о ярлыках |
| [**searchShipments()**](ShipmentsApi.md#searchShipments) | **PUT** /campaigns/{campaignId}/first-mile/shipments | Получение информации об отгрузках |


## `confirmShipment()`

```php
confirmShipment($campaign_id, $shipment_id, $body): \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm
```

Подтверждение отгрузки

Подтверждает отгрузку товаров в сортировочный центр или пункт приема заказов. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.
$body = new \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm(); // \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm

try {
    $result = $apiInstance->confirmShipment($campaign_id, $shipment_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->confirmShipment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |
| **body** | **\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm**|  | |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm**](../Model/CampaignsCampaignIdFirstMileShipmentsShipmentIdConfirm.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadShipmentAct()`

```php
downloadShipmentAct($campaign_id, $shipment_id): \SplFileObject
```

Получение акта приема-передачи

{% note alert %}  Если ваш магазин подключен к экспресс‑доставке и вы отгружаете заказы курьерам Яндекс Go, подготавливать акт приема‑передачи не нужно.  {% endnote %}  Запрос формирует акт приема-передачи заказов, входящих в отгрузку, и возвращает акт в формате PDF. В акте содержатся собранные и готовые к отправке заказы. Можно запросить акт в день отгрузки или накануне — в зависимости от указанного времени формирования отгрузки в личном кабинете.  При формировании акта Маркет автоматически находит и подставляет в шаблон следующие данные:  {% cut \"Данные, из которых Маркет формирует акт\" %}  | Данные в акте  | Описание  | | ----------- | ----------- | | Дата       | Дата запроса.       | | Отправитель       | Название вашего юридического лица, указанное в личном кабинете магазина. | | Исполнитель       | Название юридического лица сортировочного центра или службы доставки. | | № отправления в системе заказчика       | Ваш идентификатор заказа, который вы указали в ответе на запрос `POST /order/accept` от Маркета. | | № отправления в системе исполнителя (субподрядчика)       | Идентификатор заказа на Маркете, как в выходных данных запроса `GET /campaigns/{campaignId}/orders`. | | Объявленная ценность | Общая сумма заказа без учета стоимости доставки, как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}`. | | Вес       | Масса брутто грузового места (суммарная масса упаковки и содержимого), как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}`. | | Количество мест | Количество грузовых мест в заказе, как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}`. |  {% endcut %}  Остальные поля нужно заполнить самостоятельно в распечатанном акте. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->downloadShipmentAct($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->downloadShipmentAct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

**\SplFileObject**

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadShipmentDiscrepancyAct()`

```php
downloadShipmentDiscrepancyAct($campaign_id, $shipment_id): \SplFileObject
```

Скачать акт расхождений

Возвращает акт расхождений для заданной отгрузки в формате xlsx. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->downloadShipmentDiscrepancyAct($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->downloadShipmentDiscrepancyAct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

**\SplFileObject**

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.ms-excel`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadShipmentInboundAct()`

```php
downloadShipmentInboundAct($campaign_id, $shipment_id): \SplFileObject
```

Скачать фактический акт приема-передачи для отгрузки

Возвращает фактически акт приема-передачи для заданной отгрузки. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->downloadShipmentInboundAct($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->downloadShipmentInboundAct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

**\SplFileObject**

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadShipmentReceptionTransferAct()`

```php
downloadShipmentReceptionTransferAct($campaign_id, $warehouse_id): \SplFileObject
```

Подтверждение ближайшей отгрузки и получение акта приема-передачи для нее

Запрос подтверждает ближайшую отгрузку и возвращает акт приема-передачи в формате PDF. Можно запросить акт в день отгрузки или накануне — в зависимости от указанного времени формирования отгрузки в личном кабинете.  {% note warning %}  Если ваш магазин подключен к экспресс‑доставке и вы отгружаете заказы курьерам [Яндекс Go](https://go.yandex/), подготавливать акт приема‑передачи не нужно.  {% endnote %}  В акт входят собранные и готовые к отправке заказы, которые отгружаются в сортировочный центр / пункт приема или курьерам Маркета.  При формировании акта Маркет автоматически находит и подставляет в шаблон следующие данные:  {% cut \"Данные, из которых Маркет формирует акт\" %}  | Данные в акте  | Описание  | | ----------- | ----------- | | Отправитель | Название вашего юридического лица, указанное в личном кабинете магазина.   | | Исполнитель | Название юридического лица сортировочного центра или службы доставки.  | | № отправления в системе заказчика | Ваш идентификатор заказа, который вы указали в ответе на запрос `POST /order/accept` от Маркета.  | | № отправления в системе исполнителя (субподрядчика) | Идентификатор заказа на Маркете, как в выходных данных запроса `GET /campaigns/{campaignId}/orders.`  | | Объявленная ценность  | Общая сумма заказа без учета стоимости доставки, как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}.`  | | Стоимость всех товаров в заказе  | Стоимость всех заказанных товаров.  | | Вес  | Масса брутто грузового места (суммарная масса упаковки и содержимого), как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}.` | | Количество мест  | Количество грузовых мест в заказе, как в выходных данных запроса `GET /campaigns/{campaignId}/orders` или `GET /campaigns/{campaignId}/orders/{orderId}.` |  {% endcut %}  Остальные поля нужно заполнить самостоятельно в распечатанном акте. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$warehouse_id = 123123; // int | Идентификатор склада

try {
    $result = $apiInstance->downloadShipmentReceptionTransferAct($campaign_id, $warehouse_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->downloadShipmentReceptionTransferAct: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **warehouse_id** | **int**| Идентификатор склада | [optional] |

### Return type

**\SplFileObject**

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `downloadShipmentTransportationWaybill()`

```php
downloadShipmentTransportationWaybill($campaign_id, $shipment_id): \SplFileObject
```

Скачать транспортную накладную

Возвращает транспортную накладную для заданной отгрузки в формате pdf. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->downloadShipmentTransportationWaybill($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->downloadShipmentTransportationWaybill: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

**\SplFileObject**

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/pdf`, `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShipment()`

```php
getShipment($campaign_id, $shipment_id): \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentId
```

Получение информации об отгрузке

Возвращает информацию об отгрузке по ее идентификатору. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->getShipment($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->getShipment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentId**](../Model/CampaignsCampaignIdFirstMileShipmentsShipmentId.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShipmentOrdersInfo()`

```php
getShipmentOrdersInfo($campaign_id, $shipment_id): \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdOrdersInfo
```

Получение информации о ярлыках

Возвращает информацию о возможности печати ярлыков-наклеек для заказов в отгрузке. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$shipment_id = 56; // int | Идентификатор отгрузки.

try {
    $result = $apiInstance->getShipmentOrdersInfo($campaign_id, $shipment_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->getShipmentOrdersInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **shipment_id** | **int**| Идентификатор отгрузки. | |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipmentsShipmentIdOrdersInfo**](../Model/CampaignsCampaignIdFirstMileShipmentsShipmentIdOrdersInfo.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `searchShipments()`

```php
searchShipments($campaign_id, $body, $page_token, $limit): \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipments
```

Получение информации об отгрузках

Возвращает информацию об отгрузках по заданным параметрам:  * дате; * статусу; * идентификатору отгрузки.  Результаты возвращаются постранично. |**⚙️ Лимит:** 200 запросов в час| |-|

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure OAuth2 access token for authorization: OAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\ShipmentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$campaign_id = 56; // int | Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**.
$body = new \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipments(); // \OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipments
$page_token = eyBuZXh0SWQ6IDIzNDIgfQ==; // string | Идентификатор страницы c результатами.  Если параметр не указан, возвращается самая старая страница.  Рекомендуется передавать значение выходного параметра `nextPageToken`, полученное при последнем запросе.  Если задан `page_token`, параметры `offset`, `page_number` и `page_size` игнорируются.
$limit = 20; // int | Количество товаров в выходных данных.

try {
    $result = $apiInstance->searchShipments($campaign_id, $body, $page_token, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShipmentsApi->searchShipments: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **campaign_id** | **int**| Идентификатор кампании и идентификатор магазина. Каждая кампания в API соответствует магазину в кабинете.  **Где его взять**  Войдите в личный кабинет, в меню слева выберите **Настройки** → **Настройки API** и скопируйте число из поля **Номер кампании**. | |
| **body** | **\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipments**|  | |
| **page_token** | **string**| Идентификатор страницы c результатами.  Если параметр не указан, возвращается самая старая страница.  Рекомендуется передавать значение выходного параметра &#x60;nextPageToken&#x60;, полученное при последнем запросе.  Если задан &#x60;page_token&#x60;, параметры &#x60;offset&#x60;, &#x60;page_number&#x60; и &#x60;page_size&#x60; игнорируются. | [optional] |
| **limit** | **int**| Количество товаров в выходных данных. | [optional] |

### Return type

[**\OpenAPI\Client\Model\CampaignsCampaignIdFirstMileShipments**](../Model/CampaignsCampaignIdFirstMileShipments.md)

### Authorization

[OAuth](../../README.md#OAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
