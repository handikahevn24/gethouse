<?php
    //database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'db_get';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    
    //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
    $query = $db->query("SELECT * FROM tbl_siswa WHERE nama_siswa LIKE '%".$searchTerm."%' ORDER BY nama_siswa ASC");
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['nama_siswa'];
    }
    
    //return json data
    echo json_encode($data);
?>