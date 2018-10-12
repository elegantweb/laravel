<?php

if (!function_exists('cdn')) {
    function cdn($path, $secure = null)
    {
        return asset(config('app.assets_url').(starts_with($path, '/') ? '' : '/').$path, $secure);
    }
}
