<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7e5f4fe982f9246296de97e8bb4e9a1f
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7e5f4fe982f9246296de97e8bb4e9a1f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7e5f4fe982f9246296de97e8bb4e9a1f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7e5f4fe982f9246296de97e8bb4e9a1f::$classMap;

        }, null, ClassLoader::class);
    }
}
