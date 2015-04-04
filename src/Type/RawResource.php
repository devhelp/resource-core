<?php

namespace Devhelp\Resource\Type;

/**
 * returns source as a content. Most useful for passing a content
 * for straightforward use in classes that depends on Resource
 *
 */
class RawResource implements Resource
{

    private $value;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

    public function getContent()
    {
        return $this->value;
    }

    public function getSource()
    {
        return $this->value;
    }

    public function changeSource($newSource)
    {
        $this->value = $newSource;
    }
}
