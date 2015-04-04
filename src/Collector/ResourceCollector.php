<?php

namespace Devhelp\Resource\Collector;

use Devhelp\Resource\Iterator\ResourceIterator;

class ResourceCollector
{

    /**
     * @var \Iterator
     */
    private $iterator;

    public function __construct(ResourceIterator $iterator)
    {
        $this->iterator = $iterator;
    }

    public function collect($limit = -1)
    {
        $resources = array();

        while ($limit && $this->iterator->valid()) {
            $resources[] = $this->iterator->current();
            $this->iterator->next();
            $limit--;
        }

        return $resources;
    }
}
