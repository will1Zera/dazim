<?php

class EscolaController{
    public static function index(){
        include 'src/components/header/index.php';
        include 'src/components/sidebar/index.php';
        include 'src/pages/escola/index.php';
        include 'src/components/footer/index.php';
    }    
}