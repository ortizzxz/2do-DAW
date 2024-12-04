<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit02e76f320300543416ef12f72ad79f03
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'S' => 
        array (
            'Services\\' => 9,
        ),
        'R' => 
        array (
            'Repositories\\' => 13,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'L' => 
        array (
            'Lib\\' => 4,
        ),
        'J' => 
        array (
            'Jesus\\Proyecto\\' => 15,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
            'Config\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/views',
        ),
        'Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/services',
        ),
        'Repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/repositories',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/models',
        ),
        'Lib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Lib',
        ),
        'Jesus\\Proyecto\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controllers',
        ),
        'Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/config',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit02e76f320300543416ef12f72ad79f03::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit02e76f320300543416ef12f72ad79f03::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit02e76f320300543416ef12f72ad79f03::$classMap;

        }, null, ClassLoader::class);
    }
}