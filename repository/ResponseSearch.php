<?php
    class ResponseSearch{
        public $page;
        public $totalRecords;
        public $result;
        public function __construct($page, $totalRecords, $result)
        {
            $this->page = $page;
            $this->result = $result;
            $this->totalRecords = $totalRecords;
        }
    }
?>