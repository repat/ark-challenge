<?php

if (! function_exists('carbon')) {
    /**
     * Helper function instantiating Carbon for views
     *
     * @param string|null $string
     * @return \Carbon\Carbon
     */
    function carbon(?string $string) : \Carbon\Carbon
    {
        return new \Carbon\Carbon($string);
    }
}
