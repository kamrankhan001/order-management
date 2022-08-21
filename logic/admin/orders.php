<?php

    require_once "../../helper/database.php";
    require_once "../../helper/validation.php";
    require_once  "../../config.php";


    class Orders{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function show(){
            $this->db->select('order_place', "*");
            return $this->db->getResult();
        }

    }


    $orders = new Orders();
