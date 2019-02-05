<?php

namespace App\Enums;

class Statuses extends BaseEnum
{
    const ACTIVE = 1;
    const NOT_ACTIVE = 0;

    /**
     * Get available statuses.
     *
     * @param $name
     * @return bool
     */
    public static function isValidStatus($name)
    {
        $constants = static::getConstants();

        return in_array($name, $constants);
    }

    /**
     * Get status names array.
     *
     * @param $value
     * @return array
     */
    public static function statuses()
    {
        return [self::ACTIVE => 'Активно', self::NOT_ACTIVE => 'Не активно'];
    }

    /**
     * Get status name.
     *
     * @param $value
     * @return string
     */
    public static function getStatusName($value)
    {
        if (array_key_exists($value, self::statuses())) {
            return self::statuses()[$value];
        } else {
            return "Incorrect status value.";
        }
    }
}