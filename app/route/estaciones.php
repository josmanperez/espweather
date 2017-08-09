<?php
/**
 * Created by PhpStorm.
 * User: Josman
 * Date: 07/08/2017
 * Time: 19:08
 */

// API Version Group
const LISTAESTACIONES = 'listaEstacionsMeteo';
const ID = 'id';

$app->group("/estaciones", function () use ($app) {
    $this->get("/all", function ($request, $response) use ($app) {
        $mapper = new JsonMapper();
        $mapper->bEnforceMapType = false;
        $mapper->bIgnoreVisibility = true;
        $json = json_decode(file_get_contents(Constante::ESTACIONES_ALL_URL), true);
        if (empty($json)) {
            return NotFoundError::sendError($response);
        }
        $estaciones = array();
        foreach ($json[LISTAESTACIONES] as $estacion) {
            $aux = $mapper->map($estacion, new Estacion());
            $estaciones[] = $aux;
        }
        print_r($estaciones);
        return $response
            ->withStatus(200)
            ->withJson(array("success" => true, "data" => $estaciones));
    });

    $this->get("/id/{id}", function ($request, $response, $args) use ($app) {
        $aux = !empty($args[ID]) ? (int)$args[ID] : null;
        if (!$aux) {
            return MissingParameters::sendError($response);
        }
        $mapper = new JsonMapper();
        $mapper->bEnforceMapType = false;
        $mapper->bIgnoreVisibility = true;
        $url = Constante::ESTACION_ID . '?idEst=' . $args[ID];
        $json = json_decode(file_get_contents($url), true);
        if (empty($json)) {
            return NotFoundError::sendError($response);
        }
        $datos = $mapper->map($json['listUltimos10min'][0], new Ambiente());
        if (empty($datos)) {
            return NotFoundError::sendError($response);
        }
        return $response
            ->withStatus(200)
            ->withJson(array("success" => true, "data" => $datos));
    });
});