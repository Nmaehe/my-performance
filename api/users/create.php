<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
include '../db.php';

$data = json_decode(file_get_contents("php://input"));

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(array("status" => "error"));
    die();
}

try {
    $stmt = $dbh->prepare("INSERT INTO cafe_cafe (name_cafe, detail_cafe, type_cafe, pok_cafe) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $data->name);
    $stmt->bindParam(2, $data->detail);
    $stmt->bindParam(3, $data->type);
    $stmt->bindParam(4, $data->pok);

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