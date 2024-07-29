<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';
try {
   
    $users = array();
    foreach($dbh->query('SELECT * from product') as $row) {
        array_push($users, array(
            'id' => $row['id_product'],
            'name' => $row['name_product'],
            'detail' => $row['detail_product'],
            'price' => $row['price_product'],
            'pok' => $row['pok_product'],
            
        ));
    }
    echo json_encode($users);
    $dbh = null;
}   catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
