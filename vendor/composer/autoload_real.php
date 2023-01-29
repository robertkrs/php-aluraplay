<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdc7d8ef3952a43162926f6cd48a755cd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitdc7d8ef3952a43162926f6cd48a755cd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdc7d8ef3952a43162926f6cd48a755cd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdc7d8ef3952a43162926f6cd48a755cd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}