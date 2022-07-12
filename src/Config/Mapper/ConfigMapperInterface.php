<?php

namespace Bagoesz21\LaravelImageHandler\Config\Mapper;

interface ConfigMapperInterface
{
    /**
     * Get all config as array
     *
     * @return array
     */
    public function toArray(): array;
}
