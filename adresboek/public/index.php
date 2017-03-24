<?php
require "../includes/boot.php";
?>

<!DOCTYPE hmtl>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <script src="assets/js/jquery-3.1.1.js"></script>
        <script src="assets/js/js.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container content">
            <?php
                require BASEPATH."includes/form.php";
            ?>
        </div>
    </body>
</html>