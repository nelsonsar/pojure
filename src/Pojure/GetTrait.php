<?php

namespace Pojure;

trait GetTrait
{
    public function get(array $map, $key, $default = null)
    {
        if (true === array_key_exists($key, $map)) {
            return $map[$key];
        }

        return $default;
    }
}
