<?php

    require_once "../../helper/database.php";
    require_once "../../helper/validation.php";
    require_once  "../../config.php";


    class Dranks{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function show(){
            $this->db->select('add_dranks', "*");
            return $this->db->getResult();
        }

        public function create(){
            $data = [
                'large_price' => $_POST['large_price'],
                'medium_price' => $_POST['medium_price'],
                'small_price' => $_POST['small_price'],
                'flavour' => $_POST['flavour'],
            ];

            $this->db->insert('add_dranks', $data);

            header("location: ../../../templates/admin/dranks.php?success=pizza add successfully");
            die();
        }

        public function edit(){
            $id = $_GET['id'];
            $this->db->select('add_dranks', "*", null, "id='$id'");
            print_r(json_encode($this->db->getResult()));
        }

        public function update(){
            $id = $_POST['id'];
            $this->db->update('add_dranks', ['large_price'=>$_POST['large_price'], 'medium_price'=>$_POST['medium_price'], 'small_price'=>$_POST['small_price'], 'flavour'=>$_POST['flavour']], "id='$id'");
            header("location: ../../../templates/admin/dranks.php?success=pizza updated successfully");
            die();
        }
    }


    $dranks = new Dranks();

    if(isset($_GET['edit'])){
        $dranks->edit();
    }

    if(isset($_POST['dranks'])){
        $dranks->create();
    }

    if(isset($_POST['update'])){
        $dranks->update();
    }