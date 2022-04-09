<?php include('../header.php'); ?>
<?php
    if (isset($_GET['id'])) {
        $_GET['DELETED'] = true;
        header("location: /");
        exit();
    }
?>