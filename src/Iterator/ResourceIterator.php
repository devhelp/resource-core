<?php

namespace Devhelp\Resource\Iterator;

use Devhelp\Resource\Type\Resource;

abstract class ResourceIterator implements \Iterator
{

    /**
     * @var Resource
     */
    protected $current;

    /**
     * @var mixed
     */
    protected $key;

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return Resource
     */
    public function current()
    {
        $this->tryLoadCurrentResource();

        return $this->current;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->moveKey();
        $this->current = null;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        $this->tryLoadCurrentResource();

        return ($this->current instanceof Resource);
    }

    private function tryLoadCurrentResource()
    {
        if (!$this->current instanceof Resource) {
            $this->loadCurrentResource();
        }
    }

    abstract protected function loadCurrentResource();
    abstract protected function moveKey();
}
