<?php
/**
 * Created by PhpStorm.
 * User: Josman
 * Date: 07/08/2017
 * Time: 18:36
 */
$base = __DIR__ . '/../app/';

$folders = [
    'lib',
    'route',
    'utils',
    'model'
];

foreach($folders as $f)
{
    foreach (glob($base . "$f/*.php") as $filename)
    {
        require $filename;
    }
}