<?php
include_once '../config/database.php';
include_once '../objects/Hotel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deleteHotel();
}

function deleteHotel()
{
    $database = new Database();
    $db = $database->getConnection();

    $hotel = new Hotel($db);

    $id = $_POST['id'] ?? die('id not defined');
    $hotel->id = $id;

    if ($hotel->delete()) {
        header('Location: /');
    } else {
        die('Something went wrong... :/');
    }
}