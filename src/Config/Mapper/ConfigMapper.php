<?php

namespace Bagoesz21\LaravelImageHandler\Config\Mapper;

use Illuminate\Support\Arr;

class ConfigMapper extends BaseConfigMapper
{
    public function toArray(): array
    {
        return config('image');
    }
}
