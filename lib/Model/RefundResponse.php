<?php

/**
 * RefundResponse
 *
 * PHP version 7.1
 *
 * @package OpenAPIServer\Model
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 */
namespace OpenAPIServer\Model;

use OpenAPIServer\Interfaces\ModelInterface;

/**
 * RefundResponse
 *
 * @package OpenAPIServer\Model
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */
class RefundResponse implements ModelInterface
{
    private const MODEL_SCHEMA = <<<'SCHEMA'
{
  "type" : "object",
  "properties" : {
    "chargeId" : {
      "type" : "string"
    },
    "refundId" : {
      "type" : "string"
    },
    "refundedAmount" : {
      "$ref" : "#/components/schemas/RefundedAmount"
    },
    "softDescriptor" : {
      "type" : "string"
    },
    "statusDetail" : {
      "$ref" : "#/components/schemas/StatusDetail"
    },
    "releaseEnvironment" : {
      "type" : "string"
    }
  }
}
SCHEMA;

    /** @var string $chargeId */
    private $chargeId;

    /** @var string $refundId */
    private $refundId;

    /** @var \OpenAPIServer\Model\RefundedAmount $refundedAmount */
    private $refundedAmount;

    /** @var string $softDescriptor */
    private $softDescriptor;

    /** @var \OpenAPIServer\Model\StatusDetail $statusDetail */
    private $statusDetail;

    /** @var string $releaseEnvironment */
    private $releaseEnvironment;

    /**
     * Returns model schema.
     *
     * @param bool $assoc When TRUE, returned objects will be converted into associative arrays. Default FALSE.
     *
     * @return array
     */
    public static function getOpenApiSchema($assoc = false)
    {
        return json_decode(static::MODEL_SCHEMA, $assoc);
    }
}
