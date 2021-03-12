<?php
use Carbon\Carbon;

if (!function_exists('cxl_asset')) {
    function cxl_asset($path)
    {
        $timestamp = Carbon::now()->timestamp;
        $secure = config('app.force_ssl');

        $path = asset($path, $secure) . '?v=';
        $path .= config('app.debug') ? $timestamp : config('app.version');

        return $path;
    }
}

if (!function_exists('generate_random_string')) {
    function generate_random_string($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
