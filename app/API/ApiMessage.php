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
    /**
     * Message padrão para CREATE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageInser(String $endpoint) : array
    {
        return [
            "data" => [
                'title' => 'Tudo certo!',
                'message' => $endpoint . ' inserido com sucesso.',
            ]
        ];
    }

    /**
     * Message padrão para UPDATE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageUpdate(String $endpoint) : array
    {
        return [
            "data" => [
                'title' => 'Tudo certo!',
                'message' => $endpoint . ' atualizado com sucesso.',
            ]
        ];
    }

    /**
     * Message padrão para DELETE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageDelete(String $endpoint) : array
    {
        return [
            'data' => [
                'title' => 'Tudo certo!',
                'message' => $endpoint . ' removido com sucesso.',
            ]
        ];
    }

    /**
     * Message padrão para ENDPOINT não encontrados
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageNotFound(String $endpoint) : array
    {
        return [
            'data' => [
                'title' => 'Oops!',
                'message' => 'Não encontrei o ' . $endpoint,
            ]
        ];
    }

    /**
     * Message padrão para ERROS NO SERVIDOR
     *
     * @return array
     */
    public static function messageErrorServer() : array
    {
        return [
            'data' => [
                'title' => 'Oops!',
                'message' => 'O servidor se comportou de forma inexperada, contate o administrador.',
            ]
        ];
    }

    /**
     * Message padrão para captura de DEBUG
     *
     * @param String $message
     * @return array
     */
    public static function messageErrorDebug(String $message) : array
    {
        return [
            'data' => [
                'title' => 'Erro de Script!',
                'message' => $message
            ]
        ];
    }
}
