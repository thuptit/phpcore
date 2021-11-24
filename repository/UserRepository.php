<?php 
    require_once('CRUDAbstract.php');
    require_once('configdb.php');
    require_once('ResponseSearch.php');
    class UserRepository extends CrudAbstract{
        public $con;
        public function __construct()
        {
            $this->con = new mysqli(ConfigDb::$server, ConfigDb::$username, ConfigDb::$password, ConfigDb::$databasename);
        }
        public function getAll($model){
            $sql = "select * from users where ('$model->name' is null or name like '%$model->name%') and ('$model->phone' is null or phone like '%$model->phone%') and ('$model->email' is null or email like '%$model->email%') order by name asc";
            $filter = $sql . ' limit ' . $model->start . ' , ' . $model->limit . '';
            $query = mysqli_query($this->con, $sql);
            //count record
            $totalRecords = mysqli_num_rows($query);
            //paginator
            $result = mysqli_query($this->con, $filter);
            $response = new ResponseSearch($model->page, $totalRecords, $result);
            return $response;
        }
        public function create($model){
            $sql = "insert into users(name, email, phone, password, type, isDeleted)
                    values('$model->name', '$model->email','$model->phone','$model->password','$model->type','$model->isDeleted')";
            $query = mysqli_query($this->con, $sql);
            if($query){
                return "Thêm mơi thành công";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function getById($id){
            $sql = "select * from users where id = '$id'";
            $query = mysqli_query($this->con,$sql);
            return $query;
        }
        public function delete($id){
            $sql = "update users set isDeleted = 1 where id = '$id' ";
            $query = mysqli_query($this->con,$sql);
            if($query){
                return "Thêm mơi thành công";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function update($model){
            $sql = "update users set name = '$model->name', email = '$model->email', phone = '$model->phone', type = '$model->type' where id = '$model->id'";
            $query = mysqli_query($this->con, $sql);
            if($query){
                return "Cập nhật người dùng thành công!";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function getUserExport(){
            $sql = "select * from users";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
    }
