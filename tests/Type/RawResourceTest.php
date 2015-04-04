<?php

namespace Devhelp\Resource\Type;


class RawResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_returns_source_as_resource_content()
    {
        $resource = new RawResource('test');

        $this->assertSame('test', $resource->getContent());
    }
}
 