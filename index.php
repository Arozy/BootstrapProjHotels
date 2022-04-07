<?php include('header.php'); ?>
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
            <a href="/views/view.php" class="btn btn-info">View</a>
            <a href="/views/edit.php" class="btn btn-warning">Edit</a>
            <a href="/views/delete.php" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include('footer.php') ?>