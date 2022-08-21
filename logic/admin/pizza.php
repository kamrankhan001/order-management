<?php

    require_once "../../helper/database.php";
    require_once "../../helper/validation.php";
    require_once  "../../config.php";


    class Pizza{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function show(){
            $this->db->select('add_pizza', "*");
            return $this->db->getResult();
        }

        public function create(){
            $data = [
                'flavour' => $_POST['flavour'],
                'large_price' => $_POST['large_price'],
                'medium_price' => $_POST['medium_price'],
                'small_price' => $_POST['small_price'],
            ];

            $this->db->insert('add_pizza', $data);

            header("location: ../../../templates/admin/pizza.php?success=pizza add successfully");
            die();
        }

        public function edit(){
            $id = $_GET['id'];
            $this->db->select('add_pizza', "*", null, "id='$id'");
            print_r(json_encode($this->db->getResult()));
        }

        public function update(){
            $id = $_POST['id'];
            $this->db->update('add_pizza', ['flavour'=> $_POST['flavour'], 'large_price'=>$_POST['large_price'], 'medium_price'=>$_POST['medium_price'], 'small_price'=>$_POST['small_price']], "id='$id'");
            header("location: ../../../templates/admin/pizza.php?success=pizza updated successfully");
            die();
        }
    }


    $pizza = new Pizza();

    if(isset($_GET['edit'])){
        $pizza->edit();
    }

    if(isset($_POST['pizza'])){
        $pizza->create();
    }

    if(isset($_POST['update'])){
        $pizza->update();
    }