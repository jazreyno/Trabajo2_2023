<?php

class ModeloJuegos
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=trabajo_especial;charset=utf8', 'root', '');
    }

    // function verJuegos(){
    function verJuegos($orderby, $order, $limit, $offset)
    {

        $sql_order = "";
        $sql_limit_offset = "";

        $order = strtoupper($order);
        switch ($order) {
            case "ASC":
                $order_dir = "ASC";
                break;
            case "DESC":
                $order_dir = "DESC";
                break;
            default:
                $order_dir = "ASC";
                break;
        }

        switch ($orderby) {

            case "videojuego":
                $sql_order = "ORDER BY videojuego $order_dir";
                break;
            case "genero":
                $sql_order = "ORDER BY genero $order_dir";
                break;
            case "empresas":
                $sql_order = "ORDER BY id_empresa $order_dir";
                break;

            default:
                $sql_order = "";
                break;
        }

        if ($limit != null && $limit > 0) {
            try {

                $sql_limit_offset = "LIMIT " . intval($limit);

                if ($offset != null && $offset > 0) {
                    try {
                        $sql_limit_offset .= " OFFSET " . intval($offset);
                    } catch (Exception $e) {
                        $sql_limit_offset = "";
                    }
                }
            } catch (Exception $e) {
                $sql_limit_offset = "";
            }
        }

        $stmt  = $this->db->prepare("SELECT * FROM videojuegos $sql_order $sql_limit_offset");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }



    function agregarJuego($nombre, $genero, $empresa)
    {
        $query = $this->db->prepare("INSERT INTO `videojuegos`(`videojuego`, `genero`, `id_empresa`) VALUES(?,?,?)");
        $query->execute([$nombre, $genero, $empresa]);

        return $this->db->lastInsertId();
    }

    function eliminarJuego($id)
    {
        $query = $this->db->prepare('DELETE FROM `videojuegos` WHERE id_videojuegos = ?'); //Verificar los nombres si estan bien.
        $query->execute([$id]);
    }


    function verJuegosId($id)
    {
        $query = $this->db->prepare("SELECT * FROM videojuegos INNER JOIN companias on videojuegos.id_empresa = companias.id_empresa WHERE id_videojuegos = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }


    function actualizarJuego($id, $nombre, $genero, $empresa)
    {
        $query = $this->db->prepare("UPDATE `videojuegos` SET videojuego = ? ,genero = ? ,id_empresa = ?  WHERE id_videojuegos = ?");
        $query->execute([$nombre, $genero, $empresa, $id]);
    }


    function verEmpresaID($id_empresa)
    {
        $query = $this->db->prepare("SELECT * FROM companias  WHERE id_empresa = ? ");
        $query->execute([$id_empresa]);
        $empresa = $query->fetch(PDO::FETCH_OBJ);
        return $empresa;
    }
}
