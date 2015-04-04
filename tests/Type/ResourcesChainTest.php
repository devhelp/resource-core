<?php

namespace Devhelp\Resource\Type;


class ResourcesChainTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ResourcesChain
     */
    private $resourcesChain;

    private $source;

    protected function setUp()
    {
        $this->source = '{"example": "json"}';

        $this->resourcesChain = new ResourcesChain(array(
            new RawResource($this->source),
            new JsonResource(),
        ));
    }

    /**
     * @test
     */
    public function it_returns_content_of_last_resource_in_chain()
    {
        $this->assertSame(array('example' => 'json'), $this->resourcesChain->getContent());
    }

    /**
     * @test
     */
    public function it_returns_source_of_first_resource_in_chain()
    {
        $this->assertSame($this->source, $this->resourcesChain->getSource());
    }

    /**
     * @test
     */
    public function it_changes_source_of_first_resource_in_chain()
    {
        $this->resourcesChain->changeSource('{"key" : "value"}');

        $this->assertSame(array('key' => 'value'), $this->resourcesChain->getContent());
    }
}
 