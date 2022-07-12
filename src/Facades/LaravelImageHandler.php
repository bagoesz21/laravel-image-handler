<?php

namespace Bagoesz21\LaravelImageHandler\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelImageHandler extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-image-handler';
    }
}
