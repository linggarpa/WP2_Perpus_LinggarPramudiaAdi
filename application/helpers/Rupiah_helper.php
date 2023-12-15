<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('rupiah')){

    function rupiah($uang)
    {
        $hasil = "Rp. ".number_format($uang, 0, ",", ".");
        return $hasil;
    }
}