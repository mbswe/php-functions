<?php

declare(strict_types = 1);

namespace mbswe\Functions;

class Str
{
    public static function kebabToPascal(string $str) : string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $str)));
    }

    public static function snakeToPascal(string $str) : string
    {
        return str_replace (' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    public static function snakeToCamel(string $str) : string
    {
        return lcfirst(static::snakeToPascal($str));
    }

    function kebabToCamel(string $str) : string
    {
        return lcfirst(static::kebabToPascal($str));
    }

    public static function startsWith($str, $start, $ignore_case = false)
    {
        return (bool) preg_match('/^'.preg_quote($start, '/').'/m'.($ignore_case ? 'i' : ''), $str);
    }

    public static function endsWith($str, $end, $ignore_case = false)
    {
        return (bool) preg_match('/'.preg_quote($end, '/').'$/m'.($ignore_case ? 'i' : ''), $str);
    }

    public static function isJson($str)
    {
        json_decode($str);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public static function isXml($str)
    {
        if (!defined('LIBXML_COMPACT'))
        {
            throw new \Exception('libxml is required to use Str::is_xml()');
        }

        $internal_errors = libxml_use_internal_errors();
        libxml_use_internal_errors(true);
        $result = simplexml_load_string($str) !== false;
        libxml_use_internal_errors($internal_errors);

        return $result;
    }

    public static function isSerialized($str)
    {
        $array = @unserialize($str);
        return ! ($array === false and $str !== 'b:0;');
    }

    public static function isHtml($str)
    {
        return strlen(strip_tags($str)) < strlen($str);
    }
}
