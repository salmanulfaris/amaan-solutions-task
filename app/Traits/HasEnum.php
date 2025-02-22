<?php

namespace App\Traits;

trait HasEnum
{
    /**
     *  Provides a static method to get all enum values as an array.
     *  Useful for dropdown menus or other UI elements.
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }


    /**
     * Provides a static method to get all enum values as a key-value array suitable for dropdowns.
     * Keys are the enum values, and values are the labels.
     *
     * @param array $exclude
     * @return array
     */
    public static function asSelectArray(array $exclude = []): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            if (!in_array($case, $exclude)) { // Check if the current case should be excluded
                $array[$case->value] = $case->label();
            }
        }
        return $array;
    }
}
