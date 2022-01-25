<?php

declare(strict_types = 1);

namespace mbswe\Functions;

class Excel
{
    public static function numToExcelColumn(int $num) : string
    {
        for($return = ""; $num >= 0; $num = intval($num / 26) - 1) {
            $return = chr($num % 26 + 0x41) . $return;
        }

        return $return;
    }
}
