<?php 
    class Order{
        public $id;
        public $name;
        public $customer_id;
        public $product_id;
        public $user_id;
        public $status;
        public $createDate;
        public $total;
        public $isDeleted;
        public function __construct($id, $name, $customer_id, $product_id, $user_id, $status,$createDate, $total, $isDeleted)
        {
            $this->id = $id;
            $this->name = $name;
            $this->customer_id = $customer_id;
            $this->product_id = $product_id;
            $this->user_id = $user_id;
            $this->status = $status;
            $this->createDate = $createDate;
            $this->total = $total;
            $this->isDeleted = $isDeleted;
        }
    }
?>