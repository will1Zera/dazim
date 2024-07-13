<?php

class EtniaController{
    public static function index(){
        include 'src/components/header/index.php';
        include 'src/components/sidebar/index.php';
        include 'src/pages/etnia/index.php';
        include 'src/components/footer/index.php';
    }    
}