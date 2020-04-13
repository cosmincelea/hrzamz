<?php

/**
 * ModelUtilsTraitTest
 *
 * PHP version 7.1
 *
 * @package OpenAPIServer
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
 * Do not edit the class manually.
 */
namespace OpenAPIServer\Utils;

use OpenAPIServer\Utils\ModelUtilsTrait as ModelUtils;
use PHPUnit\Framework\TestCase;

/**
 * ModelUtilsTraitTest Class Doc Comment
 *
 * @package OpenAPIServer\Utils
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 * @coversDefaultClass \OpenAPIServer\Utils\ModelUtilsTrait
 */
class ModelUtilsTraitTest extends TestCase
{
    /**
     * @covers ::getSimpleRef
     * @dataProvider provideRefs
     */
    public function testGetSimpleRef($ref, $expectedRef)
    {
        $this->assertSame($expectedRef, ModelUtils::getSimpleRef($ref));
    }

    public function provideRefs()
    {
        return [
            'Reference Object OAS 3.0' => [
                '#/components/schemas/Pet', 'Pet',
            ],
            'Reference Object Swagger 2.0' => [
                '#/definitions/Pet', 'Pet',
            ],
            'Underscored classname' => [
                '#/components/schemas/_foobar_Objects', '_foobar_Objects',
            ],
            'Relative Documents With Embedded Schema' => [
                'definitions.json#/Pet', null,
            ],
            'null as argument' => [
                null, null,
            ],
            'number as argument' => [
                156, null,
            ],
        ];
    }

    /**
     * @covers ::toModelName
     * @dataProvider provideModelNames
     */
    public function testToModelName($name, $prefix, $suffix, $expectedModel)
    {
        $this->assertSame($expectedModel, ModelUtils::toModelName($name, $prefix, $suffix));
    }

    public function provideModelNames()
    {
        return [
            // fixtures from modules/openapi-generator/src/test/java/org/openapitools/codegen/utils/StringUtilsTest.java
            ['abcd', null, null, 'Abcd'],
            ['some-value', null, null, 'SomeValue'],
            ['some_value', null, null, 'SomeValue'],
            ['$type', null, null, 'Type'],
            ['123', null, null, 'Model123'],
            ['$123', null, null, 'Model123'],
            ['return', null, null, 'ModelReturn'],
            ['200Response', null, null, 'Model200Response'],
            ['abcd', 'SuperModel', null, 'SuperModelAbcd'],
            ['abcd', null, 'WithEnd', 'AbcdWithEnd'],
            ['abcd', 'WithStart', 'AndEnd', 'WithStartAbcdAndEnd'],
            ['_foobar_Objects', null, null, 'FoobarObjects'],
            [null, null, null, null],
        ];
    }
}
