<?php

    require_once "../helper/database.php";
    require_once "../helper/validation.php";
    require_once  "../config.php";


    class Home{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function pizza(){
            $this->db->select('add_pizza', '*');
            return $this->db->getResult();
        }

        public function fries(){
            $this->db->select('add_fries', '*');
            return $this->db->getResult();
        }

        public function dranks(){
            $this->db->select('add_dranks', '*');
            return $this->db->getResult();
        }

    }

    $home = new Home();