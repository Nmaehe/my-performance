<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';
try {
   $stmt = $dbh->prepare("SELECT * FROM product WHERE id_product = ?");
   $stmt->execute([$_GET['id']]);
   foreach ($stmt as $row) {
    $pro = array(
        'id' => $row['id_product'],
        'name' => $row['name_product'],
        'detail' => $row['detail_product'],
        'price' => $row['price_product'],
        'pok' => $row['pok_product'],
    );
    echo json_encode($pro);
    break;
   }
    $dbh = null;
}   catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>