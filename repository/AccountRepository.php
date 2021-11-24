<?php
    require_once("configdb.php");
    class AccountRepository{
        public $con;
        public function __construct()
        {
            $this->con = new mysqli(ConfigDb::$server, ConfigDb::$username, ConfigDb::$password, ConfigDb::$databasename);
        }
        public function login($username, $password){
            $sql = "select * from users where email = '$username' and password = '$password' ";
			$query = mysqli_query($this->con, $sql);
            return $query;
        }
    }
?>