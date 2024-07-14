<?php

class AlunoController{
    public static function index(){
        include 'src/components/header/index.php';
        include 'src/components/sidebar/index.php';
        include 'src/pages/aluno/index.php';
        include 'src/components/footer/index.php';
    }    
}