<?php

//Query biuld

namespace App\Db;

use \PDO;
use \PDOException;

class Database {

    const HOST = 'localhost';
    const NAME = 'u868151405_aposta';
    const USER = 'u868151405_teste';
    const PASS = 'Teste2023';
    private $table;
    private $connection;
    private $erro = ''
            . '<head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport"
                          content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <link rel="stylesheet" href="recursos/css/material-icons.css" />
                    <link href="recursos/css/extraCSS.css" rel="stylesheet" type="text/css" />
                    <!-- Para alerta -->
                    <link href="recursos/css/alert_css.css" rel="stylesheet" type="text/css" />

                    <!-- Locais -->
                    <link href="recursos/css/materialize.min.css" rel="stylesheet" type="text/css" >
                    <script type="text/javascript"
                    src="recursos/js/jquery.js"></script>'
            . '</head>';

    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            if ($statement->errorCode() == 42000) {
                $use_table = $this->table;
                        $this->erro .= '<div class="materialert error">
                                <div class="material-icons">error_outline</div>
                                <button class="btn waves-effect waves-light red darken-1" onclick="history.go(-1);">← clique aqui para voltar</button>
                                &nbsp;&nbsp;&nbsp;Impossivel responder a essa consulta!<br>
                                &nbsp;&nbsp;&nbsp;Porque essa turma não foi atribuida a um docente. './/(' . $e . ')
                            $e.'</div>';
                die($this->erro);
            } else {
                $this->erro .= '<div class="materialert error">
                                <div class="material-icons">error_outline</div>
                                <button class="btn waves-effect waves-light red darken-1" onclick="history.go(-1);">← clique aqui para voltar</button>
                                &nbsp;&nbsp;&nbsp;Impossivel responder a essa consulta!
                                <br>&nbsp;&nbsp;&nbsp;Por favor contacte o adminitrador'.
                        $statement->errorCode() . 
                        $e . 
                            '</div>';
                die($this->erro);
            }
        }
    }

    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';
        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;
        return $this->execute($query);
    }

    public function update($where, $values) {
        $fields = array_keys($values);

        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        $this->execute($query, array_values($values));

        return true;
    }
    public function delete($where) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->execute($query);
        return true;
    }

}
