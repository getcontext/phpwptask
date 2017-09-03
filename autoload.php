<?php
/**
 * Created by PhpStorm.
 * User: wizard
 * Date: 03.09.17
 * Time: 22:53
 */

return function ($prefix, $baseDir) {
    spl_autoload_register(function ($class) use ($prefix, $baseDir) {
        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }

        // get the relative class name
        $relative_class = substr($class, $len);

        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with .php
        $parts = explode("\\", $relative_class);
//        $class = $parts[count($parts - 1)];
        $className = array_pop($parts);
        array_walk($parts, function ($v, $k) {
            $v = strtolower($v);
        });
        $ns = implode("\\", $parts);
//        $file = $baseDir . str_replace('\\', '/', $relative_class) . '.php';
        $file = $baseDir . $ns . $className;
        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    });
};