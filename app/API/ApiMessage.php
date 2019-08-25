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
     * Messagem padrão para CREATE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageInser(String $endpoint) : array
    {
        return [
            "data" => [
                'title' => 'Pronto!',
                'message' => $endpoint . ' inserido com sucesso.',
            ]
        ];
    }

    /**
     * Messagem padrão para UPDATE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageUpdate(String $endpoint) : array
    {
        return [
            "data" => [
                'title' => 'Pronto!',
                'message' => $endpoint . ' atualizado com sucesso.',
            ]
        ];
    }

    /**
     * Messagem padrão para DELETE
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageDelete(String $endpoint) : array
    {
        return [
            'data' => [
                'title' => 'Pronto!',
                'message' => $endpoint . ' removido com sucesso.',
            ]
        ];
    }

    /**
     * Messagem padrão para ENDPOINT não encontrados
     *
     * @param String $endpoint
     * @return array
     */
    public static function messageNotFound(String $endpoint) : array
    {
        return [
            'data' => [
                'title' => 'Oops!',
                'message' => 'Não encontrei o ' . $endpoint . '.',
            ]
        ];
    }

    /**
     * Messagem padrão para ERROS NO SERVIDOR
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
     * Messagem padrão para captura de DEBUG
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

    /**
     * Messagem padrão para TOKEN inválido
     *
     * @return array
     */
    public static function messageUnauthorized() : array
    {
        return [
            'data' => [
                'title' => 'Oops!',
                'message' => 'Token inválido',
            ]
        ];
    }

    /**
     * Messagem padrão para LOGOUT
     *
     * @return array
     */
    public static function messageLogout() : array
    {
        return [
            'data' => [
                'title' => 'Pronto!',
                'message' => 'Usuário deslogado!',
            ]
        ];
    }
}
