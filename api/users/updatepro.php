<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';

$data = json_decode(file_get_contents("php://input"));

if($_SERVER['REQUEST_METHOD'] !== 'PATCH') {
    echo json_encode(array("status" => "error"));
    die();
}

try {
    $stmt = $dbh->prepare("UPDATE product SET name_product=?, detail_product=?, price_product=?, pok_product=? WHERE id_product=?");
    $stmt->bindParam(1, $data->name);
    $stmt->bindParam(2, $data->detail);
    $stmt->bindParam(3, $data->price);
    $stmt->bindParam(4, $data->pok);
    $stmt->bindParam(5, $data->id);

    if ($stmt->execute()) {
        echo json_encode(array("status" => "ok"));
    } else {
        echo json_encode(array("status" => "error"));
    }

    $dbh = null;
}   catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>