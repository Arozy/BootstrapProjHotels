<?php include('header.php'); ?>
<?php
$database = new Database();
$db = $database->getConnection();

$hotels = new Hotel($db);
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
            <form action="/views/view.php" method="GET">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-info btn-action">View</button>
            </form>
            <form action="/views/edit.php" method="GET">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-warning btn-action">Edit</button>
            </form>
            <form action="/controllers/DeleteHotelController.php" method="POST">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-danger btn-action">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include('footer.php') ?>