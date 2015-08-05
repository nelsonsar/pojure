<?php

namespace Pojure;

trait GetInTrait
{
    use GetTrait;

    public function getIn(array $map, array $keys, $default = null)
    {
        $key = array_shift($keys);
        $result = $this->get($map, $key, $default);

        if (true === is_array($result)) return $this->getIn($result, $keys, $default);

        return $result;
    }
}
