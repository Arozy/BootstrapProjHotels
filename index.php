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
            <form action="/views/view.php" method="get">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-info btn-action">View</button>
            </form>
            <form action="/views/edit.php" method="get">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-warning btn-action">Edit</button>
            </form>
            <form action="/views/delete.php" method="get">
                <input type="hidden" name="id" value="<?= $hotel['id']; ?>">
                <button type="submit" class="btn btn-danger btn-action">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include('footer.php') ?>