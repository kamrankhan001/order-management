<?php

    require_once "../../helper/database.php";
    require_once "../../helper/validation.php";
    require_once  "../../config.php";


    class Fries{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function show(){
            $this->db->select('add_fries', "*");
            return $this->db->getResult();
        }

        public function create(){
            $data = [
                'large_price' => $_POST['large_price'],
                'medium_price' => $_POST['medium_price'],
                'small_price' => $_POST['small_price'],
            ];

            $this->db->insert('add_fries', $data);

            header("location: ../../../templates/admin/fries.php?success=pizza add successfully");
            die();
        }

        public function edit(){
            $id = $_GET['id'];
            $this->db->select('add_fries', "*", null, "id='$id'");
            print_r(json_encode($this->db->getResult()));
        }

        public function update(){
            $id = $_POST['id'];
            echo $_POST['price'];
            $this->db->update('add_fries', ['large_price'=>$_POST['large_price'], 'medium_price'=>$_POST['medium_price'], 'small_price'=>$_POST['small_price']], "id='$id'");
            header("location: ../../../templates/admin/fries.php?success=pizza updated successfully");
            die();
        }
    }


    $fries = new Fries();

    if(isset($_GET['edit'])){
        $fries->edit();
    }

    if(isset($_POST['fries'])){
        $fries->create();
    }

    if(isset($_POST['update'])){
        $fries->update();
    }