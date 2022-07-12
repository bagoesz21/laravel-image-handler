<?php

namespace Bagoesz21\LaravelImageHandler\Config;

use Illuminate\Support\Arr;

class ImageConfig
{
    /** @var \Bagoesz21\LaravelImageHandler\Config\Mapper\BaseConfigMapper */
    protected $mapper;
    protected $config = [];

    /**
     * @param mixed|null $mapper
     * @return self
     */
    public static function make($mapper = null)
    {
        return (new self($mapper));
    }

    /**
     * @param mixed|null $mapper
     */
    public function __construct($mapper = null)
    {
        $this->setMapper(!is_null($mapper) ? $mapper : config('image.mapper'));
    }

    public function setMapper($mapper)
    {
        $this->mapper = app($mapper);
        return $this;
    }

    public function toArray()
    {
        if(!$this->mapper)return null;
        return $this->mapper->toArray();
    }

    public function get($key, $default = null)
    {
        return Arr::get($this->toArray(), $key, $default);
    }
}
