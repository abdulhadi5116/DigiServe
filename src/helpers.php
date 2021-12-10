<?php

if (!function_exists('formatIdr')) {
    function formatIdr($amount) {
        $formatterIdr = 'Rp'. number_format($amount,2,',','.');
        return $formatterIdr;
    }
}

if (!function_exists('getConfig')) {
    function getConfig($key, $fallback = null)
    {
        // Set the $config variable as static so it keeps it's value between calls
        static $config;

        if (is_null($config)) {
            // This will only be done the first time this function is called.
            $config = include 'configs.php';
        }

        return array_key_exists($key, $config)
            ? $config[$key]
            : $fallback;
    }
}