<?php

namespace Bagoesz21\LaravelImageHandler\Config;

use Illuminate\Support\Arr;

class ConfigBuilder
{
    protected $queue = [];
    protected $locale = null;

    protected $other = [];

    /**
     * @return self
     */
    public static function make()
    {
        return (new self());
    }

    public function __construct()
    {

    }

    public function queue($val)
    {
        $this->queue = $val;
        return $this;
    }

    /**
     * @param array $val
     * @return self
     */
    public function other($val)
    {
        $this->other = $val;
        return $this;
    }

    public function buildMinimal(): array
    {
        return array_merge([
            'queue' => $this->queue,
        ], $this->other);
    }

    /**
     * @return array
     */
    public function build(): array
    {
        return $this->buildMinimal();
    }

    /**
     * @param array $config
     * @return self
     */
    public function config($config)
    {
        $this->queue(Arr::get($config, 'queue'))
        ->other(Arr::except($config, [
            'queue'
        ]));
        return $this;
    }
}
