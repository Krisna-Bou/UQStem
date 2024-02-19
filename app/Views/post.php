<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Post</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    
</head>
<body class="page-overview">
    <header>
        <?php $session = session(); ?>  
        <h2>
        <small>    
            <?php echo "[",$session->get('pid'), ", ", $session->get('cid'), ", ",$session->get('date'),"]"; ?>
            <?php echo '<br>'?>
        </small>
        </h2>
        <?php if (session()->get('username')) {
            if ($session->get('fav') == false) {
                echo form_open(base_url().'post/favourite'); ?>
                <div class="form-group">
                    <button type="submit" class="col-2 btn btn-primary btn-block">Favourite</button>
                </div>
                <?php echo form_close(); 
            }
            ?>
            <?php if ($session->get('fav') == true) {
                echo form_open(base_url().'post/unfavourite'); ?>
                <div class="form-group">
                    <button type="submit" class="col-2 btn btn-primary btn-block">Unfavourite</button>
                </div>
                <?php echo form_close(); 
            }
        }
            ?>

        <h1>
        <?php echo $session->get('title'); ?>
        </h1>
    </header>


    <?php if ($session->get('postpic')) 
        { 
            ?>
        <img src="<?php echo $session->get('postpic')?>">
    <?php } ?>

    <p> <?php echo $session->get('body'); ?> </p>

    <div class='content'>
      <!-- Dropzone -->
      <form action="<?= base_url('submit/upload') ?>" class="dropzone" name="file">
      </form> 
    </div> 

    <?php
        foreach ($rid as $row) {
        ?>
        <div id="element">
        <?php
            echo '______________________________________________________________________________';
            echo '<br>';
            echo "<b>[",$row['username'],", ",$row['date'],"] </b>";
            echo $row['rbody'];
            echo '<br>';
            echo '<br>';
        ?>
        </div>
        <?php
        }
    ?>
    <div class='col-5'>
        <?php if (session()->get('username')) { ?>
            <?php echo form_open(base_url() . 'post/make_comment'); ?>
            <h2>
            <small class="text-center">New Comment</small>
        </h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Comment" required="required" name="comment">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <?php echo form_close(); ?>
        <?php }  ?>
    </div>
    

    <script>
		function scroll() {
            $(window).unload(function() {
                var scrollPosition = $("div#element").scrollTop();
                localStorage.setItem("scrollPosition", scrollPosition);
            });
            if(localStorage.scrollPosition) {
                $("div#element").scrollTop(localStorage.getItem("scrollPosition"));
            }
        }
    </script>
</body>
</html>
