<?php

declare(strict_types = 1);

namespace mbswe\Functions;

class Num
{
    public static function formatBytes($bytes = 0, $decimals = 0)
    {
        $quant = array(
            'TB' => 1099511627776,
            'GB' => 1073741824,
            'MB' => 1048576,
            'KB' => 1024,
            'B ' => 1,
        );

        foreach ($quant as $unit => $mag) {
            if (doubleval($bytes) >= $mag) {
                return sprintf('%01.' . $decimals . 'f', ($bytes / $mag)) . ' ' . $unit;
            }
        }

        return false;
    }
}
