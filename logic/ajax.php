<?php

    require_once "../helper/database.php";
    require_once "../helper/validation.php";
    require_once  "../config.php";
    session_start();
    if(!isset($_SESSION['total_price'])){
        $_SESSION['total_price'] = 0;
    }
    if(!isset($_SESSION['order'])){
        $_SESSION['order'] = "";
    }


    class Manage{

        protected $db;

        public function __construct(){
            $this->db = new Database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
        }

        public function pizza(){
            $flavour = $_POST['flavour'];
            $qty = $_POST['qty'];
            $size = $_POST['size'];
            if($_POST['size'] == 'Large'){
                $this->db->select('add_pizza', 'large_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $price = $result[0]['large_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('pizza', ['pizza'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "pizza:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('pizza', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['pizza']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html, $_SESSION['total_price']]));
            }

            if($_POST['size'] == 'Medium'){
                $this->db->select('add_pizza', 'medium_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $price = $result[0]['medium_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('pizza', ['pizza'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "pizza:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('pizza', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['pizza']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html, $_SESSION['total_price']]));
            }

            if($_POST['size'] == 'Small'){
                $this->db->select('add_pizza', 'small_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $_SESSION['order'] .= "{$flavour} {$qty} {$size} {$price} ";
                $price = $result[0]['small_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('pizza', ['pizza'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "pizza:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('pizza', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['pizza']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html, $_SESSION['total_price']]));
            }
        }

        public function fries(){
            $qty = $_POST['qty'];
            $size = $_POST['size'];
            if($_POST['size'] == 'Large'){
                $this->db->select('add_fries', 'large_price');
                $result = $this->db->getResult();
                $price = $result[0]['large_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('fries', ['qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "fires:{$size} quantity:{$qty} price:{$price} ";
                $this->db->select('fries', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>Fries<td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html, $_SESSION['total_price']]));
            }

            if($_POST['size'] == 'Medium'){
                $this->db->select('add_fries', 'medium_price');
                $result = $this->db->getResult();
                $price = $result[0]['medium_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('fries', ['qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "fires:{$size} quantity:{$qty} price:{$price} ";
                $this->db->select('fries', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>Fries<td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html, $_SESSION['total_price']]));
            }

            if($_POST['size'] == 'Small'){
                $this->db->select('add_fries', 'small_price');
                $result = $this->db->getResult();
                $price = $result[0]['small_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('fries', ['qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "fires:{$size} quantity:{$qty} price:{$price} ";
                $this->db->select('fries', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>Fries<td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html,$_SESSION['total_price']]));
            }
            
        }

        public function dranks(){
            $flavour = $_POST['flavour'];
            $qty = $_POST['qty'];
            $size = $_POST['size'];
            if($_POST['size'] == '2.5'){
                $this->db->select('add_dranks', 'large_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $price = $result[0]['large_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('dranks', ['drank'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "Drank:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('dranks', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['drank']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html,$_SESSION['total_price']]));
            }

            if($_POST['size'] == '1.5'){
                $this->db->select('add_dranks', 'medium_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $price = $result[0]['medium_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('dranks', ['drank'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "Drank:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('dranks', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['drank']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html,$_SESSION['total_price']]));
            }

            if($_POST['size'] == '1\2'){
                $this->db->select('add_dranks', 'small_price', null, "flavour='$flavour'");
                $result = $this->db->getResult();
                $price = $result[0]['small_price'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + (intval($price) * intval($qty));
                $this->db->insert('dranks', ['drank'=>$flavour, 'qty'=>$_POST['qty'], 'price'=>$price, 'size'=>$_POST['size']]);
                $id = $this->db->getResult();
                $_SESSION['order'] .= "Drank:{$flavour} quantiy:{$qty} size:{$size} price:{$price} ";
                $this->db->select('dranks', '*', null, "id='$id[0]'");
                $results = $this->db->getResult();
                $html = "<tr>";
                foreach($results as $result){
                    $html .= "<td>{$result['drank']}</td><td>{$result['qty']}</td><td>{$result['size']}</td><td>{$result['price']}</td></tr>";
                }
                print_r(json_encode([$html,$_SESSION['total_price']]));
            }
        }

        public function order(){
            if($_SESSION['order'] != '' and $_SESSION['total_price'] != 0){

                $this->db->insert('order_place', ['order_done'=>$_SESSION['order'], 'total'=>$_SESSION['total_price']]);
                session_destroy();
                header("location: ../templates/home.php?success=Order Place Done");
                die();
            }else{
                header("location: ../templates/home.php?error=Please add some meal");
                die();
            }
        }

    }

    $manage = new Manage();

    if(isset($_POST['pizza'])){
        $manage->pizza();
    }
    
    if(isset($_POST['fries'])){
        $manage->fries();
    }

    if(isset($_POST['dranks'])){
        $manage->dranks();
    }

    if(isset($_POST['order'])){
        $manage->order();
    }