<?php

namespace Devhelp\Resource\Type;


class FileResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FileResource
     */
    private $resource;

    private $fileName;

    private $fileContent;

    protected function setUp()
    {
        $this->resource = new FileResource();
    }

    /**
     * @test
     */
    public function it_returns_content_of_a_file()
    {
        $this->given_file_has_content();
        $this->then_resource_returns_file_content();
    }

    /**
     * @test
     * @expectedException Devhelp\Resource\Exception\ResourceDoesNotExist
     */
    public function it_returns_exception_if_file_does_not_exist()
    {
        $this->given_file_does_not_exist();

        $this->resource->changeSource($this->fileName);
        $this->resource->getContent();
    }

    private function given_file_does_not_exist()
    {
        $fileName = sys_get_temp_dir() . '/' . __FUNCTION__;

        @unlink($fileName);

        $this->fileName = $fileName;
    }

    private function given_file_exists()
    {
        $this->given_file_does_not_exist();

        touch($this->fileName);
    }

    private function given_file_has_content()
    {
        $this->given_file_exists();

        $fileContent = 'test content';

        file_put_contents($this->fileName, $fileContent);

        $this->fileContent = $fileContent;
    }

    private function then_resource_returns_file_content()
    {
        $this->resource->changeSource($this->fileName);

        $this->assertSame($this->fileContent, $this->resource->getContent());
    }
}
