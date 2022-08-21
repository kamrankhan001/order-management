<?php

    class Validation{

        protected $errors = array();

        public function required($field){
            if($this->field_exist($field)){
                if(trim($_POST[$field]) == '' or trim($_POST[$field]) == null){
                    array_push($this->errors, [$field=>$field." is required"]);
                    return false;
                }else{
                    return true;
                }
            }
        }

        public function alpha($field){
            if($this->field_exist($field)){
                if(!(ctype_alpha($_POST[$field]))){
                    array_push($this->errors, [$field=>"only alphabets are allowed"]);
                    return false;
                }else{
                    return true;
                }
            }
        }
        
        public function alphanum($field){
            if($this->field_exist($field)){
                if(!(ctype_alnum($_POST[$field]))){
                    array_push($this->errors, [$field=>"only alphabets and number are allowed"]);
                    return false;
                }else{
                    return true;
                }
            }
        }

        public function email($field) {
            if($this->field_exist($field)){
                if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
                    array_push($this->errors, [$field=>$_POST[$field]." not a valid email"]);
                    return false;
                }else {
                    return true;
                }
            }
            
        }

        public function number($field){
            if($this->field_exist($field)){
                if(!(is_numeric($_POST[$field]))){
                    array_push($this->errors, [$field=>"only number is allowed"]);
                    return false;
                }else {
                    return true;
                }
            }
        }

        public function min($field, $min=4){
            if($this->field_exist($field)){
                if(strlen($_POST[$field]) < $min){
                    array_push($this->errors, [$field=>"value must be more then {$min}"]);
                    return false;
                }else {
                    return true;
                }
            }
        }

        public function max($field, $max=16){
            if($this->field_exist($field)){
                if(strlen($_POST[$field]) > $max){
                    array_push($this->errors, [$field=>"value must be less than {$max}"]);
                    return false;
                }else {
                    return true;
                }
            }
        }

        public function password_confirm($field){
            if($this->field_exist($field)){
                if(!($_POST[$field] === $_POST['confirmation_password'])){
                    array_push($this->errors, [$field=>"password confirmation not match"]);
                    return false;
                }else {
    
                    return true;
                }
            }
        }

        public function file($file, array $allowed){
            $extension = array_slice(explode('.', $file),-1);
            if(!in_array($extension[0], $allowed)){
                $extensions = '';
                for($i=0; $i<count($allowed); $i++){
                    $extensions .= $allowed[$i]." ";
                }
                return "Only these type of files allowed {$extensions}";
            }else {
                return true;
            }
        }

        public function validater(array $validater){
            $validations = array_values($validater);
            if($this->is_validater($validations)){
                foreach ($validater as $key => $values) {
                    foreach($values as $val){
                        $value = explode(":",$val);
                        if($value[0] == 'required'){
                            if($this->required($key)){continue;}else{break;}
                        }
                        if($value[0] == 'email'){
                            if($this->email($key)){continue;}else{break;}
                        }
                        if($value[0] == 'number'){
                            if($this->number($key)){continue;}else{break;}
                        }
                        if($value[0] == 'alpha'){
                            if($this->alpha($key)){continue;}else{break;}
                        }
                        if($value[0] == 'alphanum'){
                            if($this->alphanum($key)){continue;}else{break;}
                        }
                        if($value[0] == 'min'){
                            if($this->min($key, $value[1])){continue;}else{break;}
                        }
                        if($value[0] == 'max'){
                            if($this->max($key, $value[1])){continue;}else{break;}
                        }
                        if($value[0] == 'password_confirm'){
                            if($this->password_confirm($key)){continue;}else{break;}
                        }
                    }
                }
            }
        }

        protected function is_validater(array $validations){
            $allowed = ['required', 'email', 'number', 'alpha', 'alphanum', 'min', 'max', 'password_confirm'];

            foreach($validations[0] as $validate){
                $val = explode(":", $validate);
                if(in_array($val[0], $allowed)){
                    continue;
                }else{
                    echo $validate." is not exist";
                    die();
                }
            }
            return true;
        }

        public function get_result(){
            return $this->errors;
        }

        protected function field_exist($field){
            if(isset($_POST[$field])){
                return true;
            }else{
                echo "undefine array key {$field}"; die();
            }
        }

    }