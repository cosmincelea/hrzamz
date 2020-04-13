<?php

/**
 * WebCheckoutDetailTest
 *
 * PHP version 7.1
 *
 * @package OpenAPIServer\Model
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * Horze Amazon Pay REST API
 *
 * A Restful API that works as a gateaway for Amazon PAY
 * The version of the OpenAPI document: v1.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Please update the test case below to test the model.
 */
namespace OpenAPIServer\Model;

use PHPUnit\Framework\TestCase;
use OpenAPIServer\Model\WebCheckoutDetail;

/**
 * WebCheckoutDetailTest Class Doc Comment
 *
 * @package OpenAPIServer\Model
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 *
 * @coversDefaultClass \OpenAPIServer\Model\WebCheckoutDetail
 */
class WebCheckoutDetailTest extends TestCase
{

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * Test "WebCheckoutDetail"
     */
    public function testWebCheckoutDetail()
    {
        $testWebCheckoutDetail = new WebCheckoutDetail();
    }

    /**
     * Test attribute "checkoutReviewReturnUrl"
     */
    public function testPropertyCheckoutReviewReturnUrl()
    {
    }

    /**
     * Test attribute "checkoutResultReturnUrl"
     */
    public function testPropertyCheckoutResultReturnUrl()
    {
    }

    /**
     * Test attribute "amazonPayRedirectUrl"
     */
    public function testPropertyAmazonPayRedirectUrl()
    {
    }

    /**
     * Test getOpenApiSchema static method
     * @covers ::getOpenApiSchema
     */
    public function testGetOpenApiSchema()
    {
        $schemaObject = WebCheckoutDetail::getOpenApiSchema();
        $schemaArr = WebCheckoutDetail::getOpenApiSchema(true);
        $this->assertIsObject($schemaObject);
        $this->assertIsArray($schemaArr);
    }
}