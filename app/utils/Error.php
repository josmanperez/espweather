<?php

/**
 * Created by PhpStorm.
 * User: Josman
 * Date: 08/08/2017
 * Time: 22:05
 */
interface Error
{

    public static function sendError($response);

}

class NotFoundError implements Error
{


    /**
     * NotFoundError constructor.
     */
    private function __construct()
    {
    }

    public static function sendError($response)
    {
        return $response
            ->withStatus(404)
            ->withHeader('Content-type', 'application/json')
            ->withJson(array("success" => false, "message" => 'Url no devolvió contenido'));
    }
}

class MissingParameters implements Error
{

    /**
     * MissingParameters constructor.
     */
    private function __construct()
    {
    }

    public static function sendError($response)
    {
        return $response
            ->withStatus(422)
            ->withHeader('Content-type', 'application/json')
            ->withJson(array("success" => false, "message" => 'Falta parámetro en la petición'));
    }


}
