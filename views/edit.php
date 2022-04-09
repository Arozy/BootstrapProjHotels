<?php include('../header.php'); ?>
<?php
    $database = new Database();
    $db = $database->getConnection();

    $hotel = new Hotel($db);

    $hotel->id = $_GET['id'] ?? die();

    $hotel->readOne();

    session_start();
?>
<div class="container-fluid col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <form method="post" action="../controllers/EditHotelController.php">
        <div class="form-group">
            <input type="hidden" name="id" id="id" value="<?= $hotel->id ?>"
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="My hotel..." value="<?= $hotel->name ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Example Street 1337" value="<?= $hotel->address ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="0048 123 456 789" value="<?= $hotel->phone ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"><?= $hotel->description ?></textarea>
        </div>
        <button type="submit" class="btn btn-info">Save</button>
        <?php if (isset($_SESSION['edited'])) { ?>
            <span style="color: green"><?= $_SESSION['edited'] ?></span>
        <?php } unset($_SESSION['edited']) ?>
    </form>
</div>
<?php include('../footer.php'); ?>