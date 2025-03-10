<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit23de79bae3e5b17606e87599ccc64c4f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MainCastTournament\\App\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MainCastTournament\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/public',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'MainCastTournament\\App\\Classes\\Category' => __DIR__ . '/../..' . '/public/Classes/Category.php',
        'MainCastTournament\\App\\Classes\\DataBase' => __DIR__ . '/../..' . '/public/Classes/DataBase.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit23de79bae3e5b17606e87599ccc64c4f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit23de79bae3e5b17606e87599ccc64c4f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit23de79bae3e5b17606e87599ccc64c4f::$classMap;

        }, null, ClassLoader::class);
    }
}
