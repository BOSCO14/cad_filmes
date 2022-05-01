<?php

namespace app\controller;

class Cadastro{

    public function cadastrar(){
        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('cadastrar.html');
       
        $conteudo = $template->render();
        echo $conteudo;
    }

    public function consultar(){
        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('consultar.html');
       
        $conteudo = $template->render();
        echo $conteudo;
    }

}