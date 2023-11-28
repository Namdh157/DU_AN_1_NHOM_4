<?php
function getDbConnection() {
    $connection = new mysqli("localhost", "root", "", "shopmixi");
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}

function getComments($productId) {
    $connection = getDbConnection();

    $sql = "SELECT comment.*, users.name, users.image FROM comment JOIN users ON comment.id_user = users.id WHERE comment.id_pro = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[] = $row;
    }

    $stmt->close();
    $connection->close();
    return $comments;
}

function insertComment($id_user, $id_pro, $content) {
    $connection = getDbConnection();

    $sql = "INSERT INTO `comment` (`content`, `id_user`, `id_pro`, `date_comment`) VALUES (?, ?, ?, NOW())";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sii", $content, $id_user, $id_pro);
    $stmt->execute();

    $isSuccessful = $stmt->affected_rows > 0;
    
    $stmt->close();
    $connection->close();

    return $isSuccessful;
}

?>