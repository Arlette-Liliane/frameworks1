<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: aemebiku
 * Date: 08/12/15
 * Time: 14:22
 */


if ( ! function_exists('en_url'))
{
    function lang_url($name)
    {


        $uri_request = $_SERVER['REQUEST_URI'];


        return base_url($name) .  substr($uri_request, 3);


        return base_url($name) . uri_string();

        return base_url($name) . uri_string();

    }
}

if ( ! function_exists('js_url'))
{
    function js_url($nom)
    {
        return base_url() . 'assets/javacript/' . $nom . '.js';
    }
}

if ( ! function_exists('img_url'))
{
    function img_url($nom)
    {
        return base_url() . 'assets/images/' . $nom;
    }
}

if ( ! function_exists('img'))
{
    function img($nom, $alt = '')
    {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}
