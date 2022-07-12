<?php
namespace Bagoesz21\LaravelImageHandler\Config\Mapper;

abstract class BaseConfigMapper implements ConfigMapperInterface
{
    public function __construct()
    {
    }

    /**
     * @return static
     */
    public static function make(){
        $class = get_called_class();
        return (new $class());
    }
}
