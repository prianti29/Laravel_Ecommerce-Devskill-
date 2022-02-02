<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MainCategory extends Enum
{
    const MensWear =   0;
    const WomensWear =   1;
    const Electronics = 2;
    public static function getDescription($value): string
    {
        if ($value === self::MensWear) {
            return "Men's Wear";
        }else if ($value === self::WomensWear) {
            return "Women's Wear";
        }
        return parent::getDescription($value);
    }
}
