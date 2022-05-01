<?php

namespace app\controller;

use \app\model\Crud;

class Cadastro{

    public function cadastrar(){
        
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('cadastrar.html');
       
        $conteudo = $template->render();
        echo $conteudo;
    }

    public function consultar(){
        
        try{
        $listRows = Crud::read();
        $loader = new \Twig\Loader\FilesystemLoader('app/view');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('consultar.html');

        $parametros = array();
        $parametros['registros'] = $listRows;
       
        $conteudo = $template->render($parametros);
        echo $conteudo;
        } catch (\Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function editar($id){

        try{
            $listRows = Crud::getRegistro($id);
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('editar.html');
    
            $parametros = array();
            $parametros['registros'] = $listRows;
           
            $conteudo = $template->render($parametros);
            echo $conteudo;
            } catch (\Exception $e){
                echo "Error: " . $e->getMessage();
            }       
        
    }

    public function deletar($id){

        try{
            $listRows = Crud::getRegistro($id);
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('deletar.html');
    
            $parametros = array();
            $parametros['registros'] = $listRows;
           
            $conteudo = $template->render($parametros);
            echo $conteudo;
            } catch (\Exception $e){
                echo "Error: " . $e->getMessage();
            }       
        
    }

    public function inserir(){
        try {
            Crud::create($_POST);
            echo '<script>alert("Registro gravado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/consultar"</script>';
        } catch (\Exception $e) {
            echo '<script>alert(" '.$e->getMessage().' ");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/cadastrar"</script>';
        }
    }

    public function alterar(){
        try {
            Crud::update($_POST);
            echo '<script>alert("Registro alterado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/consultar"</script>';
        } catch (\Exception $e) {
            echo '<script>alert(" '.$e->getMessage().' ");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/editar"</script>';
        }
    }

    public function excluir(){
        try {
            Crud::delete($_POST);
            echo '<script>alert("Registro excluído com sucesso!");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/consultar"</script>';
        } catch (\Exception $e) {
            echo '<script>alert(" '.$e->getMessage().' ");</script>';
            echo '<script>location.href="http://localhost/cad_filmes/?router=cadastro/consultar"</script>';
        }
    }


}