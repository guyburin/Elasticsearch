<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d24ca1f21896f88acba710911491b1b
{
    public static $files = array (
        'ad155f8f1cf0d418fe49e248db8c661b' => __DIR__ . '/..' . '/react/promise/src/functions_include.php',
        '8592c7b0947d8a0965a9e8c3d16f9c24' => __DIR__ . '/..' . '/elasticsearch/elasticsearch/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'React\\Promise\\' => 14,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Stream\\' => 18,
            'GuzzleHttp\\Ring\\' => 16,
        ),
        'E' => 
        array (
            'Elasticsearch\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'React\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/promise/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'GuzzleHttp\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/ezimuel/guzzlestreams/src',
        ),
        'GuzzleHttp\\Ring\\' => 
        array (
            0 => __DIR__ . '/..' . '/ezimuel/ringphp/src',
        ),
        'Elasticsearch\\' => 
        array (
            0 => __DIR__ . '/..' . '/elasticsearch/elasticsearch/src/Elasticsearch',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d24ca1f21896f88acba710911491b1b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d24ca1f21896f88acba710911491b1b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
