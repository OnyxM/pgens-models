<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit43ce3b39e94550b31a7c7f957f358a5d
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

        spl_autoload_register(array('ComposerAutoloaderInit43ce3b39e94550b31a7c7f957f358a5d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit43ce3b39e94550b31a7c7f957f358a5d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit43ce3b39e94550b31a7c7f957f358a5d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}