<?php
include_once '../config/database.php';
include_once '../objects/Hotel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    editHotel();
}

function editHotel()
{
    $database = new Database();
    $db = $database->getConnection();

    $hotel = new Hotel($db);

    $id = $_POST['id'] ?? die('id not defined');
    $name = $_POST['name'] ?? die('name not defined');
    $phone = $_POST['phone'] ?? die('phone not defined');
    $address = $_POST['address'] ?? die('address not defined');
    $description = $_POST['description'] ?? die('description not defined');

    $hotel->id = $id;
    $hotel->name = $name;
    $hotel->phone = $phone;
    $hotel->address = $address;
    $hotel->description = $description;

    if ($hotel->update()) {
        session_start();
        $_SESSION['edited'] = 'Data saved successfully ✓';
        header('location: ../views/edit.php?id='.$id);
    }
    else {
        http_response_code(500);
        die('Something went wrong... :/');
    }
}