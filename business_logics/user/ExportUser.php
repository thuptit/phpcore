<?php
 require_once('../../repository/UserRepository.php');
     //get data
     $userRepo = new UserRepository();
     $data = $userRepo->getUserExport();
     $rows = array();
     while ($row = mysqli_fetch_array($data)) {
         $rows[] = array(
             'ID'    =>    $row["id"],
             'Name'  =>    $row['name'],
             'Email' =>    $row['email'],
             'Phone' =>    $row['phone'],
             'Type'  =>    $row['type']
         );
     }
     $timestamp = time();
     $filename = 'Export_excel_' . $timestamp . '.xls';
     
     header("Content-Type: application/vnd.ms-excel");
     header("Content-Disposition: attachment; filename=\"$filename\"");
     
     $isPrintHeader = false;
     foreach ($rows as $row) {
         if (! $isPrintHeader) {
             echo implode("\t", array_keys($row)) . "\n";
             $isPrintHeader = true;
         }
         echo implode("\t", array_values($row)) . "\n";
     }
     exit();
?>