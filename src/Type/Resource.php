<?php

namespace Devhelp\Resource\Type;

use Devhelp\Resource\Exception\ResourceCouldNotBeRead;
use Devhelp\Resource\Exception\ResourceDoesNotExist;

interface Resource
{
    /**
     * returns data that can be used to create recipe
     *
     * @throws ResourceDoesNotExist
     * @throws ResourceCouldNotBeRead
     * @return mixed
     */
    public function getContent();

    /**
     * returns source for the recipe content
     *
     * @return mixed
     */
    public function getSource();

    /**
     * change the source of a recipe
     *
     * @param mixed $newSource
     * @return mixed
     */
    public function changeSource($newSource);
}
