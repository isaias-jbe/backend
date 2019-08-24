<?php
/**
 * Created by PhpStorm.
 * User: isaias
 * Date: 23/08/19
 * Time: 00:27
 */

namespace App\API;


use PhpParser\Node\Scalar\String_;

class ApiMessage
{

    public static function messageInserOrUpdate(String $endpoint) : array
    {
        return [
            "data" => [
                'code' => 200,
                'message' => "{$endpoint} inserido com sucesso",
            ]
        ];
    }

    public static function messageDelete(String $endpoint) : array
    {
        return [
            'data' => [
                'code' => 200,
                'message' => "{$endpoint} removido com sucesso",
            ]
        ];
    }

    public static function messageNotFound(String $endpoint) : array
    {
        return [
            'data' => [
                'code' => 404,
                'message' => "{$endpoint} não encontrado",
            ]
        ];
    }

    public static function messageErrorServer() : array
    {
        return [
            'data' => [
                'code' => 500,
                'message' => 'Ops! Erro ao realizar a operação',
            ]
        ];
    }

    public static function messageErrorDebug(String $message) : array
    {
        return [
            'data' => [
                'code' => 500,
                'message' => $message
            ]
        ];
    }
}
