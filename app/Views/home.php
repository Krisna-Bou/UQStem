<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    
</head>
<body class="page-overview">
    <header>
        <h1>Welcome to UQSTEM</h1>
    </header>
    <div>
        <p>The website to ask educational questions.</p>
    </div>	
    <?php
        foreach (array_reverse($pid) as $row) {
            ?>
                        <div id="post"> <?php
            echo "<b>[",$row['pid'], ", ", $row['cid'], ", ",$row['username'],"]</b>";
            echo '<a class="mx-4" href="post/', $row['pid'],'">',$row['title'],' </a>';
            echo $row['body'];
            echo '<br>';
            echo '<br>';
            ?>
        </div>
        <?php
        }
    ?>


<script>
		function scroll() {
            $(window).unload(function() {
                var scrollPosition = $("div#post").scrollTop();
                localStorage.setItem("scrollPosition", scrollPosition);
            });
            if(localStorage.scrollPosition) {
                $("div#element").scrollTop(localStorage.getItem("scrollPosition"));
            }
        }
    </script>
</body>
</html>
