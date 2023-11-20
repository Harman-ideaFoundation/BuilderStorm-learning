<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19b0974c8ed31292a8cd7bea470e26f5
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'u' => 
        array (
            'user_authentication\\' => 20,
        ),
        'l' => 
        array (
            'login_process\\' => 14,
        ),
        'c' => 
        array (
            'connection\\' => 11,
        ),
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'user_authentication\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/classes/service',
        ),
        'login_process\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/classes/repository',
        ),
        'connection\\' => 
        array (
            0 => __DIR__ . '/../..' . '/config',
        ),
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19b0974c8ed31292a8cd7bea470e26f5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19b0974c8ed31292a8cd7bea470e26f5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19b0974c8ed31292a8cd7bea470e26f5::$classMap;

        }, null, ClassLoader::class);
    }
}
