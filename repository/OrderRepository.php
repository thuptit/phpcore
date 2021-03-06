<?php
    require_once('CRUDAbstract.php');
    require_once('configdb.php');
    require_once('ResponseSearch.php');
    class OrderRepository{
        public $con;
        public function __construct()
        {
            $this->con = new mysqli(ConfigDb::$server, ConfigDb::$username, ConfigDb::$password, ConfigDb::$databasename);
        }
        public function getDropDownCustomer(){
            $sql = "select id, name from customers";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function getDropDownProduct(){
            $sql = "select * from products";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function createOrder($model){
            $sql = "insert into orders(name, customer_id, product_id, user_id, status, createdDate, isDeleted, total)
                    values('$model->name', $model->customer_id, $model->product_id, $model->user_id, $model->status, STR_TO_DATE('$model->createDate', '%m/%d/%Y %T'), 0, $model->total)";
            $query = mysqli_query($this->con, $sql);
            if($query){
                return "Thêm mơi thành công";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function getAll($model){
            $sql = "select o.id, o.name, p.name as namePro, cus.name as nameCus, u.name as nameUser, o.status, o.createdDate, o.total, p.image as url, p.price
                    from orders as o
                    join customers as cus on cus.id = o.customer_id
                    join products as p on p.id = o.product_id
                    join users as u on u.id = o.user_id
                    where o.isDeleted = 0
                    and ('$model->nameOrder' is null or o.name like '%$model->nameOrder%')
                    and ('$model->nameCustomer' is null or cus.name like '%$model->nameCustomer%')
                    and ('$model->nameProduct' is null or p.name like '%$model->nameProduct%')
                    and ($model->status = -1 or o.status = $model->status)
                    order by o.createdDate desc";
            $filter = $sql . ' limit ' . $model->start . ' , ' . 10 . '';

            $query = mysqli_query($this->con, $sql);
            //count record
            $totalRecords = mysqli_num_rows($query);
            //paginator
            $result = mysqli_query($this->con, $filter);
            $response = new ResponseSearch($model->page, $totalRecords, $result);
            return $response;
        }
        public function handleOrder($id, $type){
            if($type == 1){
                $sql = "update orders 
                        set status = 1 
                        where id = $id";
                $query = mysqli_query($this->con, $sql);
                if($query){
                    return "Duyệt thành công!";
                }
                else{
                    return "Error: " . $sql . "<br>" . mysqli_error($this->con);
                }
            }
            else{
                $sql = "update orders
                        set status = 2 
                        where id = $id";
                $query = mysqli_query($this->con, $sql);
                if($query){
                    return "Từ chối thành công!";
                }
                else{
                    return "Error: " . $sql . "<br>" . mysqli_error($this->con);
                }
            }
        }
        public function deleteOrder($id){
            $sql = "update orders set isDeleted = 1 where id = $id";
            $query = mysqli_query($this->con, $sql);
            if($query){
                return "Hủy đơn hàng thành công!";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function getOrderById($id){
            $sql = "select o.id, p.id as product_id, cus.id as customer_id,o.name, p.name as namePro, cus.name as nameCus, u.name as nameUser, o.status, o.createdDate, o.total, p.price
                    from orders as o
                    join customers as cus on cus.id = o.customer_id
                    join products as p on p.id = o.product_id
                    join users as u on u.id = o.user_id
                    where o.isDeleted = 0 and o.id = $id";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
        public function updateOrder($id, $name, $customer_id, $product_id, $total){
            $sql = "update orders 
                    set name = '$name', customer_id = $customer_id, product_id = $product_id, total = $total
                    where id = $id";
            $query = mysqli_query($this->con, $sql);
            if($query){
                return "Cập nhật đơn hàng thành công!";
            }
            else{
                return "Error: " . $sql . "<br>" . mysqli_error($this->con);
            }
        }
        public function statistics($month, $year){
            $sql = "select o.status, count(*) as total 
                    from orders o 
                    where isDeleted = 0 and (YEAR(o.createdDate) = $year AND MONTH(o.createdDate) = $month)
                    group by o.status";
            $query = mysqli_query($this->con, $sql);
            return $query;
        }
    }
?>