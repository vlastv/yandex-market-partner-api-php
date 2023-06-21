<?php
/**
 * OrderStatusType
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Партнерский API Маркета
 *
 * API Яндекс Маркета помогает продавцам автоматизировать и упростить работу с маркетплейсом.  В числе возможностей интеграции:  * управление каталогом товаров и витриной,  * обработка заказов,  * изменение настроек магазина,  * получение отчетов.
 *
 * The version of the OpenAPI document: LATEST
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;
use \OpenAPI\Client\ObjectSerializer;

/**
 * OrderStatusType Class Doc Comment
 *
 * @category Class
 * @description Статус заказа:  * &#x60;CANCELLED&#x60; — заказ отменен.  * &#x60;DELIVERED&#x60; — заказ получен покупателем.  * &#x60;DELIVERY&#x60; — заказ передан в службу доставки.  * &#x60;PICKUP&#x60; — заказ доставлен в пункт самовывоза.  * &#x60;PROCESSING&#x60; — заказ находится в обработке.  * &#x60;UNPAID&#x60; — заказ оформлен, но еще не оплачен (если выбрана оплата при оформлении).  Также могут возвращаться другие значения. Обрабатывать их не требуется.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class OrderStatusType
{
    /**
     * Possible values of this enum
     */
    public const PLACING = 'PLACING';

    public const RESERVED = 'RESERVED';

    public const UNPAID = 'UNPAID';

    public const PROCESSING = 'PROCESSING';

    public const DELIVERY = 'DELIVERY';

    public const PICKUP = 'PICKUP';

    public const DELIVERED = 'DELIVERED';

    public const CANCELLED = 'CANCELLED';

    public const PENDING = 'PENDING';

    public const REJECTED = 'REJECTED';

    public const PARTIALLY_RETURNED = 'PARTIALLY_RETURNED';

    public const RETURNED = 'RETURNED';

    public const CANCELLED_WITHOUT_REFUND = 'CANCELLED_WITHOUT_REFUND';

    public const UNKNOWN = 'UNKNOWN';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::PLACING,
            self::RESERVED,
            self::UNPAID,
            self::PROCESSING,
            self::DELIVERY,
            self::PICKUP,
            self::DELIVERED,
            self::CANCELLED,
            self::PENDING,
            self::REJECTED,
            self::PARTIALLY_RETURNED,
            self::RETURNED,
            self::CANCELLED_WITHOUT_REFUND,
            self::UNKNOWN
        ];
    }
}


