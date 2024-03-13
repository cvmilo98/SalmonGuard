<?php

namespace Controllers;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        $router->render('paginas/index', [
            
        ]);
    }

    public static function contactanos(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        $router->render('paginas/contactanos', [
            
        ]);
    }

    public static function nosotros(Router $router) {
        echo "Desde el nosotros";
    }

    public static function salmonCoho(Router $router) {
        $router->render('paginas/salmonCoho', [
            
        ]);
    }

    public static function salmonAtlantico(Router $router) {
        $router->render('paginas/salmonAtlantico', [
            
        ]);
    }

    public static function truchaArcohiris(Router $router) {
        $router->render('paginas/truchaArcohiris', [
            
        ]);
    }

    public static function enviar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        $router->render('paginas/enviar', [
            
        ]);
    }

    public static function subirVideo(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
        
        $router->render('paginas/subirVideo', [
            
        ]);
    }

    public static function analisis(Router $router) {
        $router->render('paginas/analisis', [
            
        ]);
    }

    public static function upload(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }
        $router->render('paginas/upload', [
            
        ]);
    }

    public static function index2(Router $router) {
        
        $router->render('paginas/index1', [
            
        ]);
    }
}

