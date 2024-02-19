<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Verify</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    
</head>
<body class="page-overview">
    <div class="col-5">
    <?php echo form_open(base_url() . 'email/verify'); ?>
        <h2><small><p>Verification Code</p></small></h2>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="user_code">
		</div>
        <div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
    </div>	
    <?php echo form_close(); ?>
</body>
</html>
