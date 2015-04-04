<?php

namespace Devhelp\Resource\Type;

use Devhelp\Resource\Exception\ResourceCouldNotBeRead;
use Devhelp\Resource\Exception\ResourceDoesNotExist;

class ResourcesChain implements Resource
{

    /**
     * @var Resource[]
     */
    private $resources;

    public function __construct(array $resources)
    {
        foreach ($resources as $resource) {
            $this->add($resource);
        }
    }

    private function add(Resource $resource)
    {
        $this->resources[] = $resource;
    }

    /**
     * returns data that can be used to create recipe
     *
     * @throws ResourceDoesNotExist
     * @throws ResourceCouldNotBeRead
     * @return mixed
     */
    public function getContent()
    {
        /**
         * copy so that shift does not change object's $readers property
         */
        $resources = $this->resources;

        $firstResource = array_shift($resources);

        /**
         * read the content with first reader
         */
        $content = $firstResource->getContent();

        /**
         * iterate through rest of the readers using content
         * of the previous as a source for the next
         */
        foreach ($resources as $resource) {
            $resource->changeSource($content);
            $content = $resource->getContent();
        }

        return $content;
    }

    public function getSource()
    {
        return $this->resources[0]->getSource();
    }

    public function changeSource($newSource)
    {
        $this->resources[0]->changeSource($newSource);
    }
}
