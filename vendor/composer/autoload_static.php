<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite537b14b840c95df22e67a8e6038e926
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite537b14b840c95df22e67a8e6038e926::$classMap;

        }, null, ClassLoader::class);
    }
}
