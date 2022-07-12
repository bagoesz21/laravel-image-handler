<?php

namespace Bagoesz21\LaravelImageHandler;

use Bagoesz21\LaravelImageHandler\Config\ImageConfig;

class LaravelImageHandler
{
    /** @var \Bagoesz21\LaravelImageHandler\Config\Mapper\BaseConfigMapper */
    protected $mapper;

    /** @var \Bagoesz21\LaravelImageHandler\Config\ImageConfig */
    protected $config;

    /**
     * @return self
     */
    public static function make()
    {
        return (new self());
    }

    public function __construct()
    {
        $mapperClass = config('image.mapper');
        $this->setMapper($mapperClass);
        $this->config = ImageConfig::make($mapperClass);
    }

    public function setMapper($mapper)
    {
        $this->mapper = app($mapper);
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
