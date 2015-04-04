<?php

namespace Devhelp\Resource\Type;

use Devhelp\Resource\Exception\ResourceCouldNotBeRead;
use Devhelp\Resource\Exception\ResourceDoesNotExist;

class FileResource implements Resource
{

    /**
     * @var string
     */
    private $path;

    public function __construct($path = null)
    {
        $this->path = $path;
    }

    public function getContent()
    {
        if (!file_exists($this->path)) {
            throw new ResourceDoesNotExist();
        }

        $content = file_get_contents($this->path);

        if ($content === false) {
            throw new ResourceCouldNotBeRead();
        }

        return $content;
    }

    public function getSource()
    {
        return $this->path;
    }

    public function changeSource($newSource)
    {
        $this->path = $newSource;
    }
}
