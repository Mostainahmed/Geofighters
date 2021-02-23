<?php
/**
 * Created by PhpStorm.
 * User: csera
 * Date: 2/14/2020
 * Time: 3:03 PM
 */

function barcode($code)
{
    $CI =& get_instance();
    $CI->load->library('zend');
    //load in folder Zend
    $CI->zend->load('Zend/Barcode');
    //generate barcode
      Zend_Barcode::draw('code128', 'image', array('text' => $code), array());
}