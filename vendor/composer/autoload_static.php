<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit37593cba8252fde91c560e2be4fc622e
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'aspose\\barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'aspose\\barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/aspose/barcode/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit37593cba8252fde91c560e2be4fc622e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit37593cba8252fde91c560e2be4fc622e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit37593cba8252fde91c560e2be4fc622e::$classMap;

        }, null, ClassLoader::class);
    }
}