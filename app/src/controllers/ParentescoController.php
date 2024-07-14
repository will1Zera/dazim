<?php

class ParentescoController{
    public static function index(){
        include 'src/components/header/index.php';
        include 'src/components/sidebar/index.php';
        include 'src/pages/parentesco/index.php';
        include 'src/components/footer/index.php';
    }    
}