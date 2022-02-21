<?php
if (file_exists('../env.php')) {
    if (!function_exists('env')) {
        function env($key, $default = null)
        {
            require '../env.php';

            if (array_key_exists($key, $env)) {
                $value = $env[$key];
            } else {
                return $default;
            }
            return $value;
        }
    }
}