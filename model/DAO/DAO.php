<?php

class DAO
{
    public function env($key, $default = null)
    {
        if (file_exists('../../env.php')) {
            require '../../env.php';

            if (array_key_exists($key, $env)) {
                $value = $env[$key];
            } else {
                return $default;
            }
            return $value;
        }
    }
}
