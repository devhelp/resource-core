<?php

namespace Devhelp\Resource\Type;

use Devhelp\Resource\Exception\ResourceCouldNotBeRead;
use Devhelp\Resource\Exception\ResourceDoesNotExist;

class JsonResource implements Resource
{

    /**
     * @var string
     */
    private $json;

    public function __construct($json = null)
    {
        $this->json = $json;
        $this->assoc = true;
    }

    public function decodeAsArray()
    {
        $this->assoc = true;
    }

    public function decodeAsObject()
    {
        $this->assoc = false;
    }

    public function getContent()
    {
        if (!$this->json) {
            throw new ResourceDoesNotExist();
        }

        $decoded = @json_decode($this->json, $this->assoc);

        if (is_null($decoded)) {
            throw new ResourceCouldNotBeRead();
        }

        return $decoded;
    }

    public function getSource()
    {
        return $this->json;
    }

    public function changeSource($newSource)
    {
        $this->json = $newSource;
    }
}
