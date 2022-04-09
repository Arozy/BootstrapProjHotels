<?php include('../header.php'); ?>
<?php
    $database = new Database();
    $db = $database->getConnection();

    $hotel = new Hotel($db);

    $hotel->id = $_GET['id'] ?? die();

    $hotel->readOne();
?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?= $hotel->imagePath1 ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $hotel->imagePath2 ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?= $hotel->imagePath3 ?>" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>
    <div class="container-fluid">
        <h1><?= $hotel->name ?></h1>
        <p><?= $hotel->description ?></p>
        <p><?= $hotel->address ?></p>
        <p><?= $hotel->phone ?></p>
    </div>
<?php include('../footer.php'); ?>