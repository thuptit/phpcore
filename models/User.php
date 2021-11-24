<?php
    class User{
        public $id;
        public $name;
        public $email;
        public $phone;
        public $password;
        public $type;
        public $isDeleted;
        public function __construct($id ,$name, $email, $phone, $password, $type, $isDeleted)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->password = $password;
            $this->type = $type;
            $this->isDeleted = $isDeleted;
        }
    }
?>