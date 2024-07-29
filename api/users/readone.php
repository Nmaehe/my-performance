<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';
try {
   $stmt = $dbh->prepare("SELECT * FROM cafe_cafe WHERE id_cafe = ?");
   $stmt->execute([$_GET['id']]);
   foreach ($stmt as $row) {
    $user = array(
        'id' => $row['id_cafe'],
        'name' => $row['name_cafe'],
        'detail' => $row['detail_cafe'],
        'type' => $row['type_cafe'],
        'pok' => $row['pok_cafe'],
    );
    echo json_encode($user);
    break;
   }
    $dbh = null;
}   catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>