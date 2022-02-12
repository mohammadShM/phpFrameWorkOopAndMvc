<?php

// sample =======================================
if (!function_exists('value')) {
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        // $value = getenv($key);
        $value = $_ENV[$key];
        if ($value === false) {
            return value($default);
        }
        return match (strtolower($value)) { //Alternatives for switch
            'true', '(true)' => true,
            'false', '(false)' => false,
            'empty', '(empty)' => '',
            'null', '(null)' => null,
            default => $value,
        };

    }
}
