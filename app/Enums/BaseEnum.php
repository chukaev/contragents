<?php

namespace App\Enums;

abstract class BaseEnum
{
    /**
     * cache reflection request
     * @var array
     */
    private static $cache = [];
    public static $available = [];

    /**
     * Get constants array.
     *
     * @return array
     */
    public static function getConstants()
    {
        if (empty(static::$cachedConstants[get_called_class()])) {
            $reflect = new \ReflectionClass(get_called_class());

            static::$cachedConstants = $reflect->getConstants();
        }

        return static::$cachedConstants;
    }
}