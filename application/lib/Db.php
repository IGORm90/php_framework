<?php

namespace application\lib;

use PDO;

class Db {
        
        protected $db;

        function __construct(){
            $config = require 'application/config/db.php';
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'], $config['user'], $config['password']);
        }
        
        public function querySQL($sql, $params = []){
            $stat = $this->db->prepare($sql);
            if(!empty($params)){
                foreach($params as $key => $val){
                    $stat->bindValue(':'.$key , $val);
                }
            }
            $stat->execute();
            return $stat;
        }

        public function row($sql, $params = []) {
            $result = $this->querySQL($sql, $params);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        public function column($sql, $params = []){
            $result = $this->querySQL($sql, $params);
            return $result->fetchColumn();
        }



    }