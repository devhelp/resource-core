<?php

namespace Devhelp\Resource\Collector;


use Devhelp\Resource\Iterator\TestResourceIterator;
use Mockery as m;

class ResourceCollectorTest extends \PHPUnit_Framework_TestCase
{

    private $iterator;

    /**
     * @var ResourceCollector
     */
    private $collector;

    protected function setUp()
    {
        $this->iterator = new TestResourceIterator();
        $this->collector = new ResourceCollector($this->iterator);
    }

    /**
     * @test
     */
    public function it_returns_resources_collected_with_iterator()
    {
        $resources = $this->collector->collect();

        $this->assertCount(3, $resources);

        foreach ($resources as $resource) {
            $this->assertInstanceOf('Devhelp\Resource\Type\RawResource', $resource);
        }
    }

    /**
     * @test
     */
    public function it_returns_no_more_resources_than_limit()
    {
        $resources = $this->collector->collect(2);

        $this->assertCount(2, $resources);
    }
}
