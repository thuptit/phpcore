<?php
    class SearchOrder{
        public $nameOrder;
        public $nameCustomer;
        public $nameProduct;
        public $status;
        public $page;
        public $limit;
        public $start;
        public function __construct($nameOrder,$nameCustomer,$nameProduct,$status,$page,$limit,$start)
        {
            $this->nameOrder = $nameOrder;
            $this->nameCustomer = $nameCustomer;
            $this->nameProduct = $nameProduct;
            $this->status = $status;
            $this->page = $page;
            $this->limit = $limit;
            $this->start = $start;
        }
    }
?>