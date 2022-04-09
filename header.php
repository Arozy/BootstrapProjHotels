<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <title>Hotels</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
<?php
include_once  'config/database.php';
include_once  'objects/hotels.php';

$database = new Database();
$db = $database->getConnection();

$hotels = new Hotels($db);
$stmt = $hotels->read();
$num = $stmt->rowCount();

if ($num>0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        $hotel_item=array(
            "id" => $id,
            "name" => $name,
            "address" => $address,
            "phone" => $phone,
        );

        $hotels_arr[] = $hotel_item;
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My Hotel Proj with Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">List of Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="views/add.php">Add a new hotel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
