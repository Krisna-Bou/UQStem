<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body class="page-overview">
    <h2>Favourites</h2>
    <?php

        echo '[';
        foreach ($fid as $row) {
            echo '<a class="mx-4" href="post/', $row['pid'],'">',$row['pid'],' </a>';
        }
        echo ']';
        echo '<br>';
        echo '<br>';
    ?>


</body>
</html>
