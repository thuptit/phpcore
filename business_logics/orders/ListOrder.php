<?php
     require_once('../../repository/OrderRepository.php');
     require_once('../../models/search/SearchOrder.php');
     $query = json_decode($_POST['query']);
     $name = $query->name;
     $nameCus = $query->nameCus;
     $namePro = $query->namePro;
     $status = $query->status;
     $limit = 10;
     $page = 1;
     if ($_POST["page"] > 1) {
         $start = (($_POST["page"] - 1) * $limit);
 
         $page = $_POST["page"];
     } else {
         $start = 0;
     }
     //get data
     $searchOrder = new SearchOrder($name, $nameCus, $namePro, $status, $limit, $page, $start);
     $orderRepo = new OrderRepository();
     $data = $orderRepo->getAll($searchOrder);
     $rows = array();
     while ($row = mysqli_fetch_array($data->result)) {
         $rows[] = array(
             'id'    =>    $row["id"],
             'name'  =>    $row['name'],
             'customer' =>    $row['nameCus'],
             'product' =>    $row['namePro'],
             'user'  =>    $row['nameUser'],
             'status' => $row['status'],
             'total' => $row['total'],
             'createdDate' => $row['createdDate']
         );
     }
     //divide data
     $total_data = $data->totalRecords;
     $pagination_html = '
     <div align="center">
           <ul class="pagination">
     ';
     $total_links = ceil($total_data / $limit);
     $previous_link = '';
     $next_link = '';
     $page_link = '';
     $page_array = array();
     if ($total_links > 4) {
         if ($page < 5) {
             for ($count = 1; $count <= 5; $count++) {
                 $page_array[] = $count;
             }
             $page_array[] = '...';
             $page_array[] = $total_links;
         } else {
             $end_limit = $total_links - 5;
             if ($page > $end_limit) {
                 $page_array[] = 1;
                 $page_array[] = '...';
                 for ($count = $end_limit; $count <= $total_links; $count++) {
                     $page_array[] = $count;
                 }
             } else {
                 $page_array[] = 1;
                 $page_array[] = '...';
                 for ($count = $page - 1; $count <= $page + 1; $count++) {
                     $page_array[] = $count;
                 }
                 $page_array[] = '...';
                 $page_array[] = $total_links;
             }
         }
     } else {
         for ($count = 1; $count <= $total_links; $count++) {
             $page_array[] = $count;
         }
     }
     for ($count = 0; $count < count($page_array); $count++) {
         if ($page == $page_array[$count]) {
             $page_link .= '
             <li class="page-item active">
                   <a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
             </li>
             ';
             $previous_id = $page_array[$count] - 1;
             if ($previous_id > 0) {
                 $previous_link = '<li class="page-item"><a class="page-link" onclick="searchOrder(' . $previous_id . ')"><i class="fa fa-chevron-left"></i></a></li>';
             } else {
                 $previous_link = '
                 <li class="page-item disabled">
                     <a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a>
                 </li>
                 ';
             }
             $next_id = $page_array[$count] + 1;
             if ($next_id >= $total_links) {
                 $next_link = '
                 <li class="page-item disabled">
                     <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                   </li>
                 ';
             } else {
                 $next_link = '
                 <li class="page-item"><a class="page-link"  onclick="searchOrder(' . $next_id . ')"><i class="fa fa-chevron-right"></i></a></li>
                 ';
             }
         } else {
             if ($page_array[$count] == '...') {
                 $page_link .= '
                 <li class="page-item disabled">
                       <a class="page-link" href="#">...</a>
                   </li>
                 ';
             } else {
                 $page_link .= '
                 <li class="page-item">
                     <a class="page-link" onclick="searchOrder(' . $page_array[$count] . ')">' . $page_array[$count] . '</a>
                 </li>
                 ';
             }
         }
     }
     $pagination_html .= $previous_link . $page_link . $next_link;
     $pagination_html .= '
         </ul>
     </div>
     ';
     $output = array(
         'data'                =>    $rows,
         'pagination'        =>    $pagination_html,
         'total_data'        =>    $total_data
     );
     echo json_encode($output);
?>