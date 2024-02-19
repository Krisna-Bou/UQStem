<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/assignment">RIZZSTEM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php if (session()->get('username')) { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login/logout"> Logout </a>
            <a class="mx-4" href="<?php echo base_url(); ?>account"> Account </a>
            <a class="mx-4" href="<?php echo base_url(); ?>submit"> Create Post </a>
        <?php } else { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login"> Login </a>
            <a class="mx-4" href="<?php echo base_url(); ?>register"> Register </a> 
        <?php } ?>

    </nav>
    <div class="container">

