<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3d375e42f8007595db2f4431a41ed074
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3d375e42f8007595db2f4431a41ed074::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3d375e42f8007595db2f4431a41ed074::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3d375e42f8007595db2f4431a41ed074::$classMap;

        }, null, ClassLoader::class);
    }
}
