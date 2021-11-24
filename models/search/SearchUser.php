<?php 
    class SearchUser{
        public $name;
        public $phone;
        public $email;
        public $page;
        public $limit;
        public $start;
        public function __construct($name, $phone, $email, $limit, $page, $start)
        {
            $this->name = $name;
            $this->phone = $phone;
            $this->email = $email;
            $this->limit = $limit;
            $this->page = $page;
            $this->start = $start;
        }
    }
?>