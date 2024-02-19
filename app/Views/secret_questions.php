<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    
</head>
<body class="page-overview">
    <header>
        <h1>Forgot Password</h1>
    </header>
    <div class="col-5">
    <?php echo form_open(base_url() . 'login/forgot/check_secret'); ?>
    <h2><small><p>Please enter your email</p></small></h2>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Email" required="required" name="email">
		</div>
        <h2><small><p>Please answer the following secret questions.</p></small></h2>
        <p> What is your favourite song?</p>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="a1">
		</div>
		<p> What city were you born in?</p>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="a2">
		</div>
        <h2><small><p>New password</p></small></h2>
		<div class="form-group">
			<input type="text" class="form-control" required="required" name="new">
		</div>
        <div class="form-group">
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
    </div>	
    <?php echo form_close(); ?>
</body>
</html>
