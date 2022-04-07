<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
    <title>Hotels</title>
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
        <a class="navbar-brand" href="#">My Hotel Proj with Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link disabled" aria-current="page" href="#">List of Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Add a new hotel</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<table class="table table-light table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone number</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($hotels_arr as $hotel): ?>
    <tr>
        <th scope="row"><?= $hotel['id']; ?></th>
        <td><?= $hotel['name']; ?></td>
        <td><?= $hotel['address']; ?></td>
        <td><?= $hotel['phone']; ?></td>
        <td>
            <button type="button" class="btn btn-info">View</button>
            <button type="button" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-danger">Delete</button>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>