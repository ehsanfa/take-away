<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    preg_match("/\/([^\/]*).*/", $context['PATH_INFO'], $matches);
    if (isset($matches[1]) && is_dir("../src/modules/".$matches[1])) {
        $module = $matches[1];
        $kernelClass = "App\\modules\\$module\\Kernel";
    } else {
        $kernelClass = Kernel::class;
    }
    return new $kernelClass($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
