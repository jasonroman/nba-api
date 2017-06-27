<?php

namespace JasonRoman\NbaApi\Params;

class AbstractParam
{
    /**
     * Override this method in individual param classes to provide a default value if none is specified.
     *
     * @return mixed|null
     */
    public function getDefaultValue()
    {
        return null;
    }
}