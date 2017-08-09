<?php
/**
 * Created by PhpStorm.
 * User: Josman
 * Date: 09/08/2017
 * Time: 21:28
 */

class Ambiente extends Estacion
{

    const HUMEDAD = 'HR_AVG_1.5m';
    const TEMPERATURA = 'TA_AVG_1.5m';

    /**
     * @var listaMedidas[]
     */
    public $listaMedidas;

    /**
     * @var string
     */
    public $instanteLecturaUTC;

    /**
     * @return string
     */
    public function getEstacion()
    {
        return $this->estacion;
    }

    /**
     * @param string $estacion
     */
    public function setEstacion($estacion)
    {
        $this->estacion = $estacion;
    }

    /**
     * @return int
     */
    public function getIdEstacion()
    {
        return $this->idEstacion;
    }

    /**
     * @param int $idEstacion
     */
    public function setIdEstacion($idEstacion)
    {
        $this->idEstacion = $idEstacion;
    }

}

class ListaMedidas
{
    /**
     * @var string
     */
    public $codigoParametro;
    /**
     * @var string
     */
    public $lnCodigoValidacion;

    /**
     * @var float
     */
    public $valor;

    /**
     * @var string
     */
    public $unidade;
}