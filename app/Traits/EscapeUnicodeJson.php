<?php
namespace App\Traits;

trait EscapeUnicodeJson
{
    /**
     * asJson
     *
     * @param  mixed $value
     * @return string|false
     */
    protected function asJson($value): string|false
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
