<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 23/08/19
 * Time: 00:27
 */

namespace App\API;


class ApiMessage
{
    public static function success($message, $code)
    {
        return [
            'data' => [
                'code' => $code,
                'message' => $message,
            ]
        ];
    }

    /**
     * @param $message
     * @param $code
     * @return array
     */
    public static function error($message, $code)
    {
        return [
            'data' => [
                'code' => $code,
                'message' => $message,
            ]
        ];
    }
}
