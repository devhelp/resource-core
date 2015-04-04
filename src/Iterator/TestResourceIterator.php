<?php

namespace Devhelp\Resource\Iterator;

use Devhelp\Resource\Type\RawResource;

class TestResourceIterator extends ResourceIterator
{
    private $testResources;

    public function __construct()
    {
        $this->testResources = array(
            new RawResource(rand(1, 100)),
            new RawResource(rand(1, 100)),
            new RawResource(rand(1, 100))
        );

        $this->key = 0;
    }

    public function rewind()
    {
        $this->key = 0;
    }

    protected function loadCurrentResource()
    {
        if (isset($this->testResources[$this->key])) {
            $this->current = $this->testResources[$this->key];
        }
    }

    protected function moveKey()
    {
        $this->key++;
    }
}
