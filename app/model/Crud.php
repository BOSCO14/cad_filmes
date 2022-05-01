<?php

namespace app\model;

use \app\database\Connection;

class Crud{

    public static function create($post){

        if(isset($post['enviar'])){
            $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
            $data = date('Y-m-d');
                  
            $con = Connection::getConn();
            $sql = "INSERT INTO cadastro (titulo,categoria,tipo, data) VALUES (:titulo, :categoria, :tipo, :data)";
            $enviar = $con->prepare($sql);
            $enviar->bindValue(':titulo', $titulo);
            $enviar->bindValue(':categoria', $categoria);
            $enviar->bindValue(':tipo', $tipo);
            $enviar->bindValue(':data', $data);
            $enviar->execute();
    
            return $enviar; 
        }       
    }

    public static function read(){

        $con = Connection::getConn();
        $sql = "SELECT * FROM cadastro";
        $enviar = $con->prepare($sql);
        $enviar->execute();
        $result = $enviar->fetchAll();

        return $result;     
    }

    public static function getRegistro($id){

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $con = Connection::getConn();
        $sql = "SELECT * FROM cadastro WHERE id = :id";
        $enviar = $con->prepare($sql);
        $enviar->bindValue(':id', $id);
        $enviar->execute();
        $result = $enviar->fetchAll();       

        return $result;     
    }

    public static function update(){

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
        $data = date('Y-m-d');

        $con = Connection::getConn();
        $sql = "UPDATE cadastro SET titulo = :titulo, categoria = :categoria, tipo = :tipo, data = :data WHERE id = :id";
        $enviar = $con->prepare($sql);
        $enviar->bindValue(':titulo', $titulo);
        $enviar->bindValue(':categoria', $categoria);
        $enviar->bindValue(':tipo', $tipo);
        $enviar->bindValue(':data', $data);
        $enviar->bindValue(':id', $id);
        $enviar->execute();
    
        return $enviar; 

    }

    public static function delete(){

        $id = $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $con = Connection::getConn();
        $sql = "DELETE FROM cadastro WHERE id = :id";
        $enviar = $con->prepare($sql);
        $enviar->bindValue(':id', $id);
        $enviar->execute();
        $result = $enviar->fetchAll();

        return $result;     

    }



}
