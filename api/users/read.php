<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';
try {
   
    $users = array();
    foreach($dbh->query('SELECT * from cafe_cafe') as $row) {
        array_push($users, array(
            'id' => $row['id_cafe'],
            'name' => $row['name_cafe'],
            'detail' => $row['detail_cafe'],
            'pok' => $row['pok_cafe'],
            'type' => $row['type_cafe'],
        ));
    }
    echo json_encode($users);
    $dbh = null;
}   catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
