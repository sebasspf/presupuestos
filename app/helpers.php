<?php

function flash($level, $message)
{
    session()->flash('flash_message', $message);
    session()->flash('flash_level', $level);
}

function crearClave($length)
{
    /*$factory = new \RandomLib\Factory;
    $generator = $factory->getLowStrengthGenerator();
    return $generator->generateString($length, 'abcdefghijklmnopqrstuvwxyz0123456789');*/
    $bytes = random_bytes(5);
    return bin2hex($bytes);
}