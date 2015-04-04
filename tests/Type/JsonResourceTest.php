<?php

namespace Devhelp\Resource\Type;


class JsonResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var JsonResource
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = new JsonResource();
    }

    /**
     * @test
     */
    public function it_decodes_json_string_as_array()
    {
        $this->resource->changeSource('{"key" : "value"}');
        $this->resource->decodeAsArray();

        $this->assertSame(array('key' => 'value'), $this->resource->getContent());
    }

    /**
     * @test
     */
    public function it_decodes_json_string_as_object()
    {
        $this->resource->changeSource('{"key" : "value"}');
        $this->resource->decodeAsObject();

        $expected = new \stdClass();
        $expected->key = 'value';

        $this->assertEquals($expected, $this->resource->getContent());
    }
}
 